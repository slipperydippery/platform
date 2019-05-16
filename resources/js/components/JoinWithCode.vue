<template>
	<div class="" id="codeinput">
		<button 
			class="btn btn-outline-secondary btn-outline-secondary--nooutline" 
			v-if="! active"
			@click="activateEnterCode"
		>
			Sluit aan met code
		</button>
        <div class="input-group pr-2" v-if="active">
            <input 
                type="text" 
                class="form-control"
                @input="code = code.toUpperCase()"
                @keydown.enter="submitCode"
                placeholder="Voer code in" 
                v-model="code"
                size="12"
                maxlength="4" 
                ref="input"
            >
            <div class="input-group-append">
                <button 
                    class="btn btn-outline-secondary" 
                    type="button" 
                    @click="submitCode"
                >
                    ok
                </button>
            </div>
        </div>
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