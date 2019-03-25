<template>
	<date-picker
		v-if="followup.created_at"
		v-model="followup.datetime"
		@input="updateFollowup"
		:disabled="beheerder"
	>
	</date-picker>
</template>

<script>

    export default {
        props: [
        	'group_id',
            'followup_id',
        	'beheerder',
        ],

        data() {
            return {
            	'followup': ''
            }
        },

        mounted() {
        	this.getFollowup();
        },

        computed: {
        },

        methods: {
        	getFollowup(){
        		var home = this;
        		axios.get('/api/followup/' + home.followup_id)
        			.then(function(response){
        				home.followup = response.data;
        			})
        	},

        	updateFollowup(){
        		var home = this;
        		axios.patch('/api/followup/' + this.followup.id, {
        			followup: this.followup
        		})
        	},
        }
    }
</script>