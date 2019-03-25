<template>
	<div class="row">
		<div class="col-sm-4" v-if="is_manager">
			<span 
				class="clickable selectable selectable--active"
				v-if="measure.frontrunner"
				@click="removeFrontrunner()"
			> 
				{{ measure.frontrunner.user.name }}
            </span>
		</div>
		<div class="col-sm-8" v-if="is_manager">
			<span 
				class="clickable selectable selectable--passive"
				v-for="scan in group.scans"
				@click="setFrontrunner(scan)"
				v-if="isntActiveScan(scan)"
			> 
                {{ scan.user.name }}
            </span>
		</div>
		<div class="col-sm-4" v-if="! is_manager">
			<span 
				class=" selectable selectable--active"
				v-if="measure.scan"
			> 
				{{ measure.scan.user.name }}
            </span>
		</div>
		<div class="col-sm-8" v-if="! is_manager">
			<span 
				class=" selectable selectable--passive"
				v-for="scan in group.scans"
				v-if="isntActiveScan(scan)"
			> 
                {{ scan.user.name }}
            </span>
		</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'measure_id',
        	'group_id',
        	'is_manager'
        ],

        data() {
            return {
            	'measure': {},
            	'group': {},
            }
        },

        mounted() {
        	this.getMeasure();
        	this.getScans();
        },

        computed: {
        },

        methods: {
        	getMeasure() {
        		var home = this;
        		axios.get('/api/measure/' + this.measure_id)
	        		.then(function(response){
	        			home.measure = response.data
	        		})
        	},

        	getScans() {
        		var home = this;
        		axios.get('/api/group/' + this.group_id + '/scan')
        			.then(function(response) {
        				home.group = response.data;
        			})
        	},

        	setFrontrunner(scan) {
        		this.measure.frontrunner = scan;
        		this.updateMeasure();
        	},

        	removeFrontrunner() {
        		this.measure.scan = null;
        		this.updateMeasure();
        	},

            updateMeasure() {
                axios.patch('/api/measure/' + this.measure_id, {
                        'measure': this.measure
                    })
                    .then(function(response) {

                    })
            },

        	isntActiveScan(scan){
        		if(this.measure.frontrunner){
        			if(scan.id == this.measure.frontrunner.id){
        				return false;
        			}
        		}
        		return true;
        	},
        }
    }
</script>