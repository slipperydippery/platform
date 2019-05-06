<template>
	<div class="">
		<div class="form-group">
		    <span class="clickable selectable selectable--passive" v-for="instantie in unSelectedInstanties" @click="addInstantie(instantie)"> {{ instantie.title }} </span> <br>
		    <span class="clickable selectable selectable--active" v-for="instantie in selectedinstanties" @click="removeInstantie(instantie)"> {{ instantie.title }} </span>
		</div>
		<div class="form-group" v-if="selectedinstanties.length">
			
		</div>
		<button class="btn btn-primary" @click="saveInstanties"> Sla instanties op</button>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'session',
            'scan_id',
            'instanties',
        ],

        data() {
            return {
                'selectedinstanties': [],
            }
        },

        mounted() {
        	this.selectedinstanties = this.session.instanties;
        },

        computed: {
        	unSelectedInstanties() {
        		return this.instanties.filter( instantie => ! this.selectedinstanties.map( instantie => instantie.id ).includes(instantie.id) );
        	},
        },

        methods: {
        	addInstantie( instantie ) {
        		this.selectedinstanties.push( instantie );
        	},

        	removeInstantie( instantie ) {
        		this.selectedinstanties.splice( this.selectedinstanties.indexOf( instantie ), 1 );
        	},

        	saveInstanties() {
        		var home = this
        		axios.post('/sessie/' + home.scan_id + '/vergelijking/instantie', {
        			instanties: home.selectedinstanties
        		})
        		.then( response => {
        			window.location.href = '/sessie/' + home.scan_id + '/vergelijking/sessies';
        		} )
        	}
        }
    }
</script>