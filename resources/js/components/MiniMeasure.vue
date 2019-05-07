<template>
	<div class="form-group">
		<i class="material-icons clickable" @click="toggleMeasure()" v-if="is_manager && measure.active" v-b-tooltip.hover title="Klik om te deselecteren"> check_box </i>
		<i class="material-icons clickable" @click="toggleMeasure()" v-if="is_manager &&! measure.active" v-b-tooltip.hover title="Klik om te selecteren"> check_box_outline_blank </i>
		<textarea 
            class="form-control" 
            ref="measureinput"
            :placeholder="measure.active ? 'Omschrijving van de verbetering' : ''"
            rows="6"
            v-model="measure.measure" 
            :disabled="! is_manager || ! measure.active"
            @blur="updateMeasure()"
        ></textarea>
        <b-tooltip ref="tooltip" :target="() => $refs['measureinput']"> 
            <span class="left">Formuleer je verbeterpunten <strong>SMART:</strong></span>
            <ul>
                <li>Specifiek</li>
                <li>Meetbaar</li>
                <li>Aanwijsbaar</li>
                <li>Realistisch</li>
                <li>Tijd georiënteerd</li>
            </ul>
        </b-tooltip>

        <b-button class="px-1" @click="onOpen" style="display: none">Open</b-button>
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
            	'measure': {}
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
            onOpen() {
                this.$refs.tooltip.$emit('open')
            },
            
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