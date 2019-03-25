<template>
	<div class="">
		<textarea 
            class="form-control" 
            placeholder="Actie Omschrijving"
            rows="6"
            v-model="measure.measure" 
            :disabled="! is_manager"
            v-b-tooltip.hover
            :title="title"
            @blur="updateMeasure()"
        ></textarea>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'measure_id',
            'is_manager'
        ],

        data() {
            return {
            	'measure': {},
            }
        },

        mounted() {
            this.getMeasure();
        },

        computed: {
            title() {
                if(this.is_manager) {
                    return ''
                }
                return 'Alleen de beheerder kan dit wijzigen.'
            }
            
        },

        methods: {
        	getMeasure() {
        		var home = this;
        		axios.get('/api/measure/' + this.measure_id)
	        		.then(function(response){
	        			home.measure = response.data
	        		})
        	},

        	toggleMeasure() {
        		this.measure.active = ! this.measure.active;
                this.updateMeasure();
        	},

            updateMeasure() {
                axios.patch('/api/measure/' + this.measure_id, {
                        'measure': this.measure
                    })
                    .then(function(response) {

                    })
            }
        }
    }
</script>