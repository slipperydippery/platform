<template>
	<div class="col-sm-12 table table__results" v-if="comparison.id">
		<div class="row resultstable--row--questions">
			<div class="col-sm-2"></div>
				<div class="col-sm-2" v-for="question in theme.questions">
					<strong>Vraag {{ question.id }} <br></strong>
					<span v-b-tooltip.html :title="question.question" html="true" v-html="question.title"></span>
				</div>
		</div>
		<div class="row resultstable--row--average">
			<div class="col-sm-2 average"> {{ comparison.scan.title }} </div>
			<div class="col-sm-2" v-for="question in theme.questions" v-if="comparison.id !== null">
                <result-slider
                    :value=" comparison.scan.answers | answerOfQuestion(question.id) "
                >
                </result-slider>
			</div>
		</div>
		<div class="row" v-for="scan in comparison.scans">
			<div 
				class="col-sm-2 nowrap" 
				:class="['instantietype-' + scan.instantie.id + '-leftborder', (scan.id == comparison.scan.user.id) ? 'owner-leftborder' : '' ]"
			> 
				{{ scan.title }} 
			</div>
			<div class="col-sm-2" v-for="question in theme.questions">
				<result-slider
					:value=" scan.answers | answerOfQuestion(question.id) "
				>
				</result-slider>
			</div>
		</div>
	</div>

</template>

<script>

    export default {
        props: [
	        'comparison_id',
	        'theme_id'
        ],

        data() {
            return {
            	'theme': {},
            	'comparison': {
                    'id': null
                }
            }
        },

        mounted() {
        	this.getTheme();
        	this.getComparison();
        },

        computed: {
        },

        filters: {
        	answerOfQuestion(value, question_id) {
        		var questionanswer = null;
        		value.forEach( answer => {
        			if( answer.question_id === question_id  ){
        				questionanswer = answer.answer;
        			}
        		} )	
        		return questionanswer;
        	}
        },

        methods: {
        	getTheme() {
        		var home = this;
        		axios.get('/api/theme/' + this.theme_id)
        			.then( response => {
        				home.theme = response.data
        			} );
        	},

        	getComparison() {
        		var home = this;
        		axios.get('/api/comparison/' + this.comparison_id)
	        		.then( response => {
	        			home.comparison = response.data
	        		} );
        	},

        	average(question) {
        		if(! this.comparison.id) {
        			return null;
        		}
                return 0;
        		var scantotal = 0;
        		var scancount = 0;
        		this.comparison.scans.forEach( scan => {
        			scan.answers.forEach( answer => {
        				if( answer.question_id === question.id && answer.answer){
        					scantotal += parseFloat(answer.answer);
        					scancount ++
        				}
        			} )
        		} )
        		return scantotal /  scancount;
        	},
        }
    }
</script>