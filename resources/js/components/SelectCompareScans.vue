<template>
	<div class="selectscans">
        {{ session.districts }} <br>
        {{ session.instantie_id }} <br>
        {{ session.scanmodel_id }} <br>
        <div class="allscans">
            <div class="scan" v-for="scan in filteredScans">
                {{ scan.title }} {{ scan.instantie_id }} {{scan.districts}} <br>
            </div>
        </div>
        ----------
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'session'
        ],

        data() {
            return {
                'scans': []
            }
        },

        mounted() {
        	this.getScans();
        },

        computed: {
            filteredScans() {
                return this.scans.filter( thisscan => {
                    if(! thisscan.group_id && thisscan.instantie_id == this.session.instantie_id ) {
                        var districtmatch = false;
                        thisscan.districts.forEach( thisdistrict => {
                            if (this.session.districts.includes(thisdistrict.id)) {
                                districtmatch = true;
                            }
                        } );
                        return districtmatch ? thisscan : '';
                    }
                })
            }
        },

        methods: {
        	getScans() {
        		var home = this;
        		axios.get('/api/scan')
                    .then( (response) => {
                        home.scans = response.data;
                    })
        	}
        }
    }
</script>