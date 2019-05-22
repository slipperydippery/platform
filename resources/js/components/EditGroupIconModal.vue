<template>
	<div class="">
	    <i class="material-icons float-right clickable"
		    	v-b-tooltip.hover title="Bewerk sessie"
	    	@click="$bvModal.show('editgroupmodal' + group.id)"
		>
			edit
	    </i>
	    <portal to="modals">
	        <b-modal 
	            :id="'editgroupmodal' + group.id" 
	            size="lg"
	            title="Bewerk de groupssessie" 
	            @ok="saveChanges(group)"
	            @cancel="cancelChanges(group)"
	        >
	        	<div class="form-group">
				    <label for="titleInput"><h5>Titel</h5></label>
		            <input id="titleInput" type="text" v-model="group.title" class="form-control">
	        	</div>

	        	<div class="form-group">
				    <label for="titleInput"><h5>Datum sessie</h5></label> <br>
				    <format-date
			            v-model="group.datetime"
			            class="mb-2 d-block font-italic"
				    >
				    </format-date>
		        	<date-picker
		        	    v-model="group.datetime"
		        	>
		        	</date-picker>
	        	</div>
	        	

			    <label for="districtInput"><h5>Wijzig gemeente(n)</h5></label>
	        	<district-input
	        		v-model ="group.scan.districts"
	        	>
	        	</district-input>

	        </b-modal>
	    </portal>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'group',

        ],

        data() {
            return {
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        	saveChanges(group) {
        		this.$emit('saveChanges')
        	},

        	cancelChanges(group) {
        		this.$emit('cancelChanges')
        	},
        }
    }
</script>