<template>
	<div class="resultslider average">
		<div class="resultslider--result"
			:style="{ width: cssPercent(average), background: nullColor(average) }"
		>
		</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'scan_id',
            'group_id',
        	'question_id',
        ],

        data() {
            return {
				'answers': [],            	
            }
        },

        mounted() {
        	this.getAnswers();
        },

        computed: {
        	average() {
        		var answertotal = 0;
        		var answercount = 0;
        		this.answers.forEach(function(answer){
                    if(answer.answer) {
                        answertotal += parseFloat(answer.answer);
                        answercount++
                    }
                })
        		return (answertotal / answercount);
        	}
        },

        methods: {
        	
        	getAnswers() {
        		var home = this;
        		axios.get('/api/scan/' + this.scan_id + '/question/' + this.question_id + '/getanswers') 
        			.then(function(response) {
        				home.answers = response.data;
                        window.Echo.private('groupscores.' + home.group_id).listen('GroupscoresUpdated', e => {
                            home.getAnswers();
                        });
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