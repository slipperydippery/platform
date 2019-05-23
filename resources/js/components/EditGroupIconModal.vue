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
	            title="Bewerk de groepssessie" 
	            ref="editmodal"
	            @ok="saveChanges(group)"
	            @cancel="cancelChanges(group)"
	        >
	        	<button class="btn btn-danger float-right" @click="$bvModal.show('deletegroupmodal' + group.id)">verwijder scan</button>
	        	<div class="form-group pt-5">
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

	        	<b-modal 
	        	    :id="'deletegroupmodal' + group.id" 
	        	    title="Weet je zeker dat je deze sessie wilt verwijderen?" 
	        	    @ok="deleteGroup(group)"
	        	>
	        		<p>Je staat op het punt om de sessie {{ group.scan.title }} te verwijderen. Weet je zeker dat je dit wilt doen? </p>
	        		<div class="alert alert-danger" role="alert">
	        		    Dit is een groepssessie, door deze te verwijderen worden ook alle aangesloten sessies met gegevens verwijderd!
	        		</div>
		        </b-modal>

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

        	deleteGroup(group) {
        		this.$refs['editmodal'].hide()
        		this.$emit('deleteGroup')
        	},
        }
    }
</script>