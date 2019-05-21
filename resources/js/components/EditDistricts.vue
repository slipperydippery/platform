<template>
    <div class="card">
        <div class="card-body">
            
        	<div class="row">
        		<div class="col-12 form-group">
        			<input type="text" class="form-control" placeholder="Zoek een gemeente" v-model="districtsearch">
        		</div>
        		<div class="col-12 overflow-hidden nowrap pt-3">
        			<label 
        				class="checkboxlabel btn btn-sm btn-secondary mr-2 clickable" 
        				v-for="district in filteredAndSortedDistricts.slice(0,10)"
                        @click="addDistrictToSelection(district)"

        			>
        				{{ district.name }}
        			</label>
        		</div>
        		<div class="col-12 pt-5">
        			<label 
                        v-for="district in selecteddistricts"
                        @click="removeDistrictFromSelection(district)"
                        class="checkboxlabel btn btn-sm btn-dark mr-2 clickable"   

        			>
        				{{ district.name }} <i class="material-icons md-18"> close </i>
        			</label>
        		</div>
        		<div class="col-12 p-3">
        			<div class="form-group text-right">
        				<button class="btn btn-secondary btn-lg" @click.prevent="updateDistricts">Sla gemeenten op</button>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
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
            this.getScan();
        	this.getDistricts();
        	// this.setSelectedDistricts();
        },

        computed: {
        	filtereddistricts: function () {
        	    var filteredarray = this.districts;
        	    var home = this;
        	    if(home.districtsearch != ''){
	        	    filteredarray = [];
        	        this.districts.forEach(function(thisdistrict){
        	            if(thisdistrict.name.toLowerCase().includes(home.districtsearch.toLowerCase())) {
        	                filteredarray.push(thisdistrict);
        	            } 
        	        })
        	    }
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
            getScan() {
                var home = this;
                axios.get('/api/scan/' + home.scan_id)
                    .then( (response) => {
                        home.scan = response.data;
                        response.data.districts.forEach( (district) => {
                            home.addDistrictToSelection(district)
                        } )
                    } )
            },

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

            addDistrictToSelection: function(thisdistrict) {
                this.selecteddistricts.push(thisdistrict);
                this.sortDistricts(this.selecteddistricts);
                this.districts.splice(this.districts.indexOf(thisdistrict), 1);
                this.filtereddistricts.splice(this.filtereddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
                this.districtsearch = '';
            },

            removeDistrictFromSelection: function(thisdistrict) {
                // this.districts.push(thisdistrict);
                this.filtereddistricts.push(thisdistrict);
                this.sortDistricts(this.filtereddistricts); 
                this.selecteddistricts.splice(this.selecteddistricts.indexOf(thisdistrict), 1);
                this.$forceUpdate();
                this.districtsearch = '';
            },


            updateDistricts() {
                var numeralDistricts = [];
                this.selecteddistricts.forEach( (thisdistrict) => {
                    numeralDistricts.push(thisdistrict.id);
                });
                console.log(numeralDistricts);
                axios.post('/api/scan/' + this.scan_id + '/updatedistricts', {
                    districts: this.selecteddistricts,
                })
                .then(function (response) {
                    // window.location.href = '/'; 
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