<template>
	<div class="">
		<a class="dropdown-item" @click="$bvModal.show('promotemodal' + scan.id)" v-if="isAdmin">Promoot tot beheerder</a>
		<portal to="modals">
		    <b-modal
		        :id="'promotemodal' + scan.id"
		        :title=" 'Weet je zeker dat je ' + scan.user.name + ' tot beheerder wilt promoten?' "
		        @ok="promoteParticipant(scan)"
		    >
		        <p>Je staat op het punt om de <strong>{{ scan.user.name }}</strong> tot eigenaar van dese groepssessie te promoten. Dat kan handig zijn als je het beheer graag wilt overdragen. Let er wel op dat je deze actie zelf niet ongedaan moet maken (alleen <strong>{{ scan.user.name }}</strong> kan jou hierna weer tot eigenaar promoten) </p>
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
        	promoteParticipant(scan) {
        		this.$emit('promoteParticipant', scan);
        	},
        }
    }
</script>