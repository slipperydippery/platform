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
	        >
	            <p class="my-4">Bewerk alles</p>
	        	<div class="form-group">
				    <label for="titleInput">Email address</label>
		            <input id="titleInput" type="text" v-model="group.title" class="form-control">
	        	</div>

	        	<div class="form-group">
				    <label for="titleInput">Datum sessie</label>
		            <input id="titleInput" type="text" v-model="group.datetime" class="form-control">
	        	</div>

	        	<div class="form-group">
				    <label for="titleInput">Gemeenten</label>
		            <input id="titleInput" type="text" v-model="group.title" class="form-control">
	        	</div>

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
        		console.log('saving changes for ' + group.title)
        	},
        }
    }
</script>