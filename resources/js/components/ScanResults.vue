<template>
	<div class="col-sm-12 table table__results">
		<div class="row resultstable--row--questions pt-2 pb-1">
			<div class="col-sm-2"></div>
				<div class="col-sm-2" v-for="question in theme.questions">
					<strong>Vraag {{ question.order }} <br></strong>
					<span v-b-tooltip.html :title="question.question" html="true" v-html="question.title"></span>
				</div>
		</div>
        <div class="row resultstable--row--average">
            <div class="col-sm-2 average d-flex flex-column justify-content-center">Gemiddeld</div>
            <div class="col-sm-2 text-center" v-for="question in theme.questions" v-if="group.id !== null">
                <strong v-if="average(question)">{{ average(question) }}</strong>
                <strong v-else> - </strong>
                <result-slider-average
                    :value = "average(question)"
                    :average = 1
                >
                </result-slider-average>
            </div>
        </div>
		<div class="row pt-1" v-for="scan in group.scans">
			<div 
				class="col-sm-2 nowrap" 
				:class="['instantietype-' + scan.instantie.id + '-leftborder', (scan.id == group.user.id) ? 'owner-leftborder' : '' ]"
			> 
				{{ scan.user.name }} 
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
	        'group_id',
	        'theme_id'
        ],

        data() {
            return {
            	'theme': {},
            	'group': {
                    'id': null
                }
            }
        },

        mounted() {
        	this.getTheme();
        	this.getGroup();
        	window.Echo.private('groupscores.' + this.group_id).listen('GroupscoresUpdated', e => {
        	    this.getGroup();
        	});
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

        	getGroup() {
        		var home = this;
        		axios.get('/api/group/' + this.group_id)
	        		.then( response => {
	        			home.group = response.data
	        		} );
        	},

        	average(question) {
        		if(! this.group.id) {
        			return null;
        		}
        		var scantotal = 0;
        		var scancount = 0;
        		this.group.scans.forEach( scan => {
        			scan.answers.forEach( answer => {
        				if( answer.question_id === question.id && answer.answer){
        					scantotal += parseFloat(answer.answer);
        					scancount ++
        				}
        			} )
        		} )
        		return Math.round(10 * scantotal /  scancount) / 10;
        	},
        }
    }
</script>