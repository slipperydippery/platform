<template>
    <div class="">
        <slider-input v-model="answer.answer" @input="saveAnswer()" :disabled="nvttrue"></slider-input>
        <button class="btn btn-outline-primary btn__nvt" @click="deactivate()" v-if="nvt && !nvttrue">niet van toepassing</button>
        <button class="btn btn-primary btn__nvt" @click="activate()" v-if="nvt && nvttrue">niet van toepassing</button>
    </div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'answer_id',
            'nvt'
        ],

        data() {
            return {
            	'answer': {},
                'nvttrue': false
            }
        },

        mounted() {
        	this.getAnswer();
        },

        computed: {
        },

        methods: {
        	getAnswer() {
        		var home = this;
        		axios.get('/api/answer/' + this.answer_id)
        			.then(function(response){
        				home.answer = response.data
        			})
        	},
        	saveAnswer() {
        		axios.put('/api/answer/' + this.answer_id, {
        			'answer': this.answer,
        		})
        	},

            deactivate() {
                this.nvttrue = true;
                this.answer.answer = null;
                this.saveAnswer();
            },

            activate() {
                this.nvttrue = false;
            }
        }
    }
</script>