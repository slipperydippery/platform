<template>
	<div class="">
		<a class="dropdown-item" @click="$bvModal.show('deletemodal' + scan.id)" v-if="isAdmin">Verwijder uit groep</a>
		<portal to="modals">
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
	        'isAdmin'
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