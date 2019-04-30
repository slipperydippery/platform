<template>
	<div class="" id="codeinput">
		<button 
			class="btn btn-outline-secondary btn-outline-secondary--nooutline" 
			v-if="! active"
			@click="activateEnterCode"
		>
			Sluit aan met code
		</button>
		<input 
			type="text" 
			class="m-1"
			@keyup="code = code.toUpperCase()"
			@keydown.enter="submitCode"
			v-if="active"
			placeholder="Voer code in" 
			v-model="code"
            ref="input"
		>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        ],

        data() {
            return {
            	active: false,
            	code: '',
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        	activateEnterCode() {
        		this.active = ! this.active;
                this.$nextTick(() => this.$refs.input.focus());
        	},

        	submitCode() {
        		var home = this;
        		axios.post('api/joingroup', {
        			code: home.code
        		})
        		.then( (response) => {
        			if(response.data.message == 'success') {
        				window.location.href = '/groep/' + response.data.group.id + '/sluitaan/' + response.data.code; 
        			} else {
    	        		this.onFail(response.data.error);
                    }
        		} );
    			home.code = '';
                this.active = ! this.active;
        	},

        	onFail(message) {
                this.$bvToast.toast(`${message}`, {
                    title: 'Aanmelding niet geslaagd',
                    autoHideDelay: 5000,
                    toaster: 'b-toaster-top-full',
                    appendToast: false,
                    variant: 'danger',
                    solid: true
                })
            },
        },
    }
</script>