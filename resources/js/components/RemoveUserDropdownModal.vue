<template>
	<div class="">
		<button type="button" class="close mr-2" @click="$bvModal.show('deletemodal' + scan.id)"  v-if="isSelf">
		      <span aria-hidden="true">&times;</span>
		</button>
		<portal to="modals" v-if="isSelf">
		    <b-modal 
		        :id="'deletemodal' + scan.id" 
		        title="Weet je zeker dat je de groepssessie wilt verlaten?" 
		        @ok="removeParticipant(scan)"
		    >
		        <p class="my-4">Je staat op het punt om de groepssessie te verlaten. Hierdoor worden al je opgeslagen resultaten gerelateerd aan deze groepssessie ook verwijderd. Weet je zeker dat je dit wilt doen? </p>
		    </b-modal>
		</portal>

		<a class="dropdown-item" @click="$bvModal.show('deletemodal' + scan.id)" v-if="isAdmin && ! isSelf">Verwijder uit groep</a>
		<portal to="modals" v-if="! isSelf">
		    <b-modal 
		        :id="'deletemodal' + scan.id" 
		        :title="'Weet je zeker dat je ' + scan.user.name + ' wilt verwijderen?' " 
		        @ok="removeParticipant(scan)"
		    >
		        <p class="my-4">Je staat op het punt om <strong>{{ scan.user.name }}</strong> uit de groepssessie te verwijderen. Weet je zeker dat je dit wilt doen? </p>
		    </b-modal>
		</portal>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'scan',
	        'isAdmin',
	        'isSelf'
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
        	removeParticipant(scan) {
        		this.$emit('removeParticipant', scan);
        	},
        }
    }
</script>