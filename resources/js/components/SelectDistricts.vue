<template>
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
			<button class="btn btn-primary" @click="updateDistricts">Update</button>
		</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
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
        				home.districts = response.data
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
                this.districts.push(thisdistrict);
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
            	axios.post('/nieuwegroupsscan/gemeenten', {
            		test: 'tester blester',
            		numdistricts: numeralDistricts,
            		districts: this.selecteddistricts,
            	})
            },
        }
    }
</script>