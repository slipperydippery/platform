<template>
	<div class="row">
		<div class="col-12 form-group">
			<input 
                type="text" 
                class="form-control" 
                placeholder="Zoek een gemeente" 
                v-model="districtsearch"
                @keydown.enter.prevent="addDistrictWithEnter()"
                focus
            >
		</div>
		<div class="col-12 overflow-hidden nowrap pt-3">
			<label 
				class="checkboxlabel btn btn-sm btn-secondary mr-2 clickable" 
				v-for="district in filteredAndSortedDistricts.slice(0,10)"
                @click="addDistrictToSelection(district)"
                v-html="district.name"
			>
			</label>
		</div>
        <div class="col-12 pt-1" v-if="districtsearch.length && filteredAndSortedDistricts.length ">
            <em>Klik op een gemeente om deze toe te voegen aan je selectie. Je kunt meerdere gemeenten selecteren. </em>
        </div>
		<div class="col-12 pt-5">
			<label 
                v-for="district in selecteddistricts"
                @click="removeDistrictFromSelection(district)"
                class="checkboxlabel btn btn-sm btn-dark mr-2 clickable"   
                v-html="district.name"
			>
				{{ district.name }} <i class="material-icons md-18"> close </i>
			</label>
		</div>
		<div class="col-12 p-3">
			<div class="form-group text-right" v-if="selecteddistricts.length">
				<button class="btn btn-secondary btn-lg" @click.prevent="updateDistricts">Sla gemeenten op</button>
			</div>
		</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'session',
            'group',
            'scan_id'

        ],

        data() {
            return {
            	'districts': [],
                'selecteddistricts': [],
            	'districtsearch': '',
            }
        },

        mounted() {
        	this.getDistricts();
        	// this.setSelectedDistricts();
        },

        computed: {
        	filtereddistricts: function () {
        	    var filteredarray = this.districts;
        	    var home = this;
                if(home.districtsearch == '') {
                    return []
                }
        	    filteredarray = [];
    	        this.districts.forEach(function(thisdistrict){
    	            if(thisdistrict.name.toLowerCase().includes(home.districtsearch.toLowerCase())) {
    	                filteredarray.push(thisdistrict);
    	            } 
    	        })
        	    return filteredarray;
        	},

        	filteredAndSortedDistricts: function() {
        	    function compare(a, b) {
        	        if (a.name < b.name){
        	            return -1;
        	        }
        	        if (a.name > b.name){
        	            return 1;
        	        }
        	        return 0;
        	    }

        	    return this.filtereddistricts.sort(compare);
        	}
        },

        methods: {
            sortDistricts: function(thisarray) {
                function compare(a, b) {
                    if (a.title < b.title){
                        return -1;
                    }
                    if (a.title > b.title){
                        return 1;
                    }
                    return 0;
                }
                return thisarray.sort(compare);
            },

        	getDistricts() {
        		var home = this;
        		axios.get('/api/district')
        			.then(function(response) {
        				home.districts = response.data;
        				home.setSelectedDistricts();
        			})
        	},

            addDistrictWithEnter () {
                if (this.districtsearch.length && this.filteredAndSortedDistricts.length) {
                    this.addDistrictToSelection(this.filteredAndSortedDistricts[0]);
                }
            },

            addDistrictToSelection: function(thisdistrict) {
                this.selecteddistricts.push(thisdistrict);
                this.sortDistricts(this.selecteddistricts);
                this.districts.splice(this.districts.indexOf(thisdistrict), 1);
                this.filtereddistricts.splice(this.filtereddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
                this.districtsearch = '';
            },

            removeDistrictFromSelection: function(thisdistrict) {
                this.districts.push(thisdistrict);
                this.filtereddistricts.push(thisdistrict);
                this.sortDistricts(this.filtereddistricts); 
                this.selecteddistricts.splice(this.selecteddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
                this.districtsearch = '';
            },

            updateDistricts() {
                if(this.group == 1) {
                    this.updateGroupDistricts();
                } else if(this.group == 2) {
                    this.updateCompareDistricts();
                } else {
                    this.updateSingleDistricts();
                }

            },

            updateGroupDistricts() {
                var numeralDistricts = [];
                this.selecteddistricts.forEach( (thisdistrict) => {
                    numeralDistricts.push(thisdistrict.id);
                });
                axios.post('/nieuwegroupsscan/gemeenten', {
                    districts: numeralDistricts,
                })
                .then(function (response) {
                    window.location.href = '/nieuwegroupsscan/instantie'; 
                })
            },

            updateCompareDistricts() {
                var numeralDistricts = [];
                var home = this;
                this.selecteddistricts.forEach( (thisdistrict) => {
                    numeralDistricts.push(thisdistrict.id);
                });
                axios.post('/sessie/' + home.scan_id + '/vergelijking/regios', {
                    districts: numeralDistricts,
                })
                .then(function (response) {
                    window.location.href = '/sessie/' + home.scan_id + '/vergelijking/instantie'; 
                })
            },
            updateSingleDistricts() {
                var numeralDistricts = [];
                this.selecteddistricts.forEach( (thisdistrict) => {
                    numeralDistricts.push(thisdistrict.id);
                });
                console.log(numeralDistricts);
                axios.post('/nieuwesoloscan/gemeenten', {
                    districts: numeralDistricts,
                })
                .then(function (response) {
                    window.location.href = '/nieuwesoloscan/instantie'; 
                })
            },

            setSelectedDistricts() {
            	this.session.districts.forEach( (district_id) => {
            		this.districts.forEach( (thisdistrict) => {
            			if(thisdistrict.id == district_id) {
            				this.addDistrictToSelection(thisdistrict);
            			}
            		} )
            	} )
            },
        }
    }
</script>