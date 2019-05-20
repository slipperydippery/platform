<template>
	<section>
		<span 
			v-if="! editing" 
           	@click="toggleEditing"
           	:class="{'clickable' : isAdmin}"
           	class="show-hidden-child"
           	v-b-tooltip.hover title="Bewerk sessie"
        > 
			{{ value }} 

            <i 
            	class="material-icons hidden-child"
            	v-if="isAdmin"
        	>
        		edit
            </i>
		</span>

		<div class="input-group" v-if="editing">
			<input type="text" class="form-control" v-model="editValue">
			<div class="input-group-append">
				<button type="button" class="btn btn-outline-success form-control">
					<i class=
						"material-icons" 
						@click="saveInput" 
						@keydown.enter="saveInput"
			           	v-b-tooltip.hover title="Sla wijzigingen op"
			        >
						check
					</i>
				</button>
				<button type="button" class="btn btn-outline-danger form-control">
					<i 
						class="material-icons" 
						@click="cancelEditing"
			           	v-b-tooltip.hover title="Annuleer"
			        >
						close
					</i>
				</button>
			</div>
		</div>

	</section>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'value',
	        'isAdmin'
        ],

        data() {
            return {
            	'editing': false,
            	'editValue': null
            }
        },

        mounted() {
        	this.editValue = this.value
        },

        computed: {
        },

        methods: {
        	saveInput() {
        		this.$emit('input', this.editValue)
        		this.$emit('saveInput')
        		this.editing = false
        	},

        	toggleEditing() {
        		this.editing = ! this.editing
        	},

        	cancelEditing() {
        		this.editValue = this.value
        		this.editing = false
        	}
        }
    }
</script>