<template>
	<div class="">
		<a class="dropdown-item" @click="$bvModal.show('messagemodal' + messagemodalID)">Stuur bericht</a>
		<portal to="modals">
		    <b-modal 
		        :id="'messagemodal' + messagemodalID" 
				ref="modal"
		        :title="'Stuur bericht naar ' + toPerson" 
				@show="resetModal"
				@hidden="resetModal"
				@ok="handleOk"
		    >
		        <form ref="form" @submit.stop.prevent="handleSubmit">
					<b-form-group
						:state="messageState"
						label="Bericht"
						label-for="message-input"
						invalid-feedback="het bericht mag niet leeg zijn"
					>
						<b-form-textarea
							id="message-input"
							v-model="message"
							:state="messageState"
							required
							rows="4"
							max-rows="8"
							placeholder="Schrijf hier je bericht. Vermeld ook je eigen e-mailadres zodat de ontvanger contact met je op kan nemen."
						></b-form-textarea>
					</b-form-group>
				</form>
		    </b-modal>
		</portal>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: {
	        scan: Object,
	        comparison_id: {
	        	type: Number,
	        	default: 0
	        },
        } ,

        data() {
            return {
		        message: '',
		        messageState: null,
            }
        },

        mounted() {
        },

        computed: {
        	toPerson() {
        		if( this.comparison_id ) return 'de eigenaar van sessie ' + this.scan.title
    			return this.scan.user.name
        	},

        	messagemodalID() {
        		if( this.comparison_id ) return this.scan.id + '_' + this.comparison_id
    			return this.scan.id
        	}
        },

        methods: {
        	resetModal() {
				this.message = ''
				this.messageState = null
        	},

			handleOk(bvModalEvt) {
				bvModalEvt.preventDefault()
				this.handleSubmit()
			},

			handleSubmit() {
				if (!this.checkFormValidity()) {
					return
				}
				this.sendMessage();
				this.$nextTick(() => {
					this.$refs.modal.hide()
				})
			},

			sendMessage() {
				var home = this;
				axios.post('api/message', {
					message: home.message,
					scan: home.scan
				})
			},

			checkFormValidity() {
				const valid = this.$refs.form.checkValidity()
				this.messageState = valid ? 'valid' : 'invalid'
				return valid
			},

        }
    }
</script>