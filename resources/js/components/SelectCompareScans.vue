<template>
	<div class="selectscans">
        <strong>Jouw gekozen gemeenten:</strong> 
            <span v-for="(district, index) in session.districts"><span v-html="districtName(district)"></span><span v-if="index != session.districts.length - 1">, </span></span> 
            <em v-if="! session.districts.length"> Alle gemeenten </em> <br>
        <strong>Jouw gekozen instanties:</strong> 
            <span v-for="(instantie, index) in session.instanties"><span v-html="instantie.title"></span><span v-if="index != session.instanties.length - 1">, </span></span> 
            <em v-if="! session.instanties.length"> Alle instanties </em> <br>
        <table class="table table-sm table-hover my-3">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> Naam sessie </th>
                    <th scope="col"> Instantie </th>    
                    <th scope="col" style="width: 45%"> Gemeente(n) </th>    
                    <th scope="col"> vragen </th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-primary">
                    <th scope="col"> {{ scan.user.name }} </th>
                    <th scope="col"> {{ instantieName(session.instantie_id) }} </th>
                    <th scope="col"> <span v-for="(district, index) in scan.districts"><span v-html="districtName(district.id)"></span><span v-if="index !== scan.districts.length - 1">, </span></span></th>
                    <th scope="col"> {{ answercount(scan) }} / {{ questioncount(scan) }} </th>
                </tr>
                <tr v-for="(thisscan, index) in selectedFilterScans" class="table-success clickable" @click="removeFromSelection(thisscan)">
                    <th scope="row"> {{ thisscan.title }} </th>
                    <td> {{ thisscan.instantie.title }} </td>
                    <td> <span v-for="(district, index) in thisscan.districts"><span v-html="districtName(district.id)"></span><span v-if="index !== thisscan.districts.length - 1">, </span></span></td>
                    <td> {{ answercount(thisscan) }} / {{ questioncount(thisscan) }} </td>
                </tr>
                <tr v-for="(thisscan, index) in unSelectedFilterScans" class="clickable" @click="addToSelection(thisscan)">
                    <th scope="row"> {{ thisscan.title }} </th>
                    <td> {{ thisscan.instantie.title }} </td>
                    <td> <span v-for="(district, index) in thisscan.districts"><span v-html="districtName(district.id)"></span><span v-if="index !== thisscan.districts.length - 1">, </span></span></td>
                    <td> {{ answercount(thisscan) }} / {{ questioncount(thisscan) }} </td>
                </tr>
            </tbody>
        </table>
        <div class="" v-if="filteredScans.length == 0"> <em> Er zijn geen scans die voldoen aan jouw gekozen criteria </em> </div>
        <input type="submit" value="Vergelijk met deze scans" class="btn btn-primary form-control" @click="saveComparison()" v-if="selectedScans.length" />
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'session',
            'scan',
            'districts',
            'instanties',
        ],

        data() {
            return {
                'scans': [],
                'selectedScans' : [],
            }
        },

        mounted() {
        	this.getScans();
        },

        computed: {
            filteredScans() {
                return this.scans.filter( thisscan => {
                    if (thisscan.group_id) return ''
                    if (thisscan.id == this.scan.id) return ''
                    if (this.session.instanties.length && ! this.session.instanties.map( instantie => instantie.id ).includes( thisscan.instantie_id )) return ''
                    var districtmatch = ! this.session.districts.length;
                    thisscan.districts.forEach( thisdistrict => {
                        if (this.session.districts.includes(thisdistrict.id)) {
                            districtmatch = true;
                        }
                    });
                    return districtmatch ? thisscan : '';
                })
            },

            selectedFilterScans() {
                return this.filteredScans.filter( thisscan => {
                    var match = false;
                    this.selectedScans.forEach( selectedScan => {
                        if (thisscan.id == selectedScan.id) {
                            match = true;
                        }
                    })
                    return match ? thisscan : '';
                })
            },

            unSelectedFilterScans() {
                return this.filteredScans.filter( thisscan => {
                    var match = false;
                    this.selectedScans.forEach( selectedScan => {
                        if (thisscan.id == selectedScan.id) {
                            match = true;
                        }
                    })
                    return match ? '' : thisscan;
                })
            },
        },

        methods: {
        	getScans() {
        		var home = this;
        		axios.get('/api/scan')
                    .then( (response) => {
                        home.scans = response.data;
                    })
        	},

            addToSelection(scan) {
                this.selectedScans.push(scan)
            },

            removeFromSelection(scan) {
                this.selectedScans.splice(this.selectedScans.indexOf(scan), 1);
            },

            districtName(district_id) {
                var districtName = '';
                this.districts.forEach( district => {
                    if(district.id == district_id) {
                        districtName = district.name;
                    }
                })
                return districtName;
            },

            instantieName(instantie_id) {
                var instantieName = '';
                this.instanties.forEach( instantie => {
                    if(instantie.id == instantie_id){
                        instantieName = instantie.title;
                    }
                })
                return instantieName;
            },

            answercount(thisscan){
                var answercount = 0;
                thisscan.answers.forEach( (thisanswer) => {
                    thisanswer.answer ? answercount++ : '';
                } )
                return answercount;
            },

            questioncount(thisscan){
                return thisscan.answers.length;
            },

            saveComparison() {
                var home = this;
                console.log('sending');
                axios.post('/api/comparison', {
                    scan: home.scan,
                    scanmodel_id: home.session.scanmodel_id,
                    instantie_id: home.session.instantie_id,
                    districts: home.session.districts,
                    scans: home.selectedScans,
                })
                .then( response => {
                    window.location.href = '/comparison/' + response.data.id;
                })

            },
        }
    }
</script>