<template>
	<div class="resultslider average">
		<div class="resultslider--result"
			:style="{ width: cssPercent(value), background: nullColor(value) }"
		>
		</div>
	</div>
</template>

<script>

    export default {
        props: [
        	'value',
        ],

        data() {
            return {
            }
        },

        mounted() {
        	// this.getAnswers();
        },

        computed: {
        	
        },

        methods: {
        	
        	getAnswers() {
        		var home = this;
        		axios.get('/api/scan/' + this.scan_id + '/question/' + this.question_id + '/getanswers') 
        			.then(function(response) {
        				home.answers = response.data;
        				response.data.forEach(function(answer){
        					window.Echo.private('groupscores.' + answer.id).listen('GroupscoresUpdated', e => {
        					    home.getAnswers();
        					});
        				})
        			})
        	},

            cssPercent: function (value) {
                if(value == null) { 
                    return 100;
                } else {
                    return (value * 10) + '%';
                }
            },

            nullColor: function (answer) {
                var thiscolor = '';
                if(answer == null) {
                    thiscolor = 'white';
                }
                return thiscolor;
            },
        }
    }
</script>