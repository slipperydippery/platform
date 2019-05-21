<template>
	<b-modal size="lg" :id="modal_id" title="Voeg een nieuw item toe" @ok="saveArticle" v-if="newValue !== null">
		<div class="form-group">
			<label 
                v-for="articletype in orderedArticletypes"
                @click="toggleArticletype(newValue, articletype)"
                class="checkboxlabel btn mr-2 clickable "  
                :class="{  'btn-secondary' : isSelected(newValue, articletype), 'btn-dark' : !isSelected(newValue, articletype) }"
                v-b-tooltip:hover :title=" articletype.description "
			>
				{{ articletype.title }}
			</label>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend" id="button-addon3">
				<button class="btn" :class=" newValue.linktype == 'link' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype(newValue, 'link')" type="button"> Link </button>
			</div>
			<div class="input-group-append">
				<button class="btn" :class=" newValue.linktype == 'file' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype(newValue, 'file')" type="button"> Bestand </button>
			</div>
		</div>

		<hr>

		<div class="form-group" v-if="newValue.linktype == 'link'">
		    <input type="text" v-model="newValue.link" class="form-control" id="inputlink" placeholder="http://www">
		</div>
		<div class="form-group" v-if="newValue.linktype == 'file'">
		    <b-form-file
				v-model="newValue.file"
				:state="Boolean(newValue.file)"
				placeholder="Kies een bestand"
				drop-placeholder="Sleep bestand hier..."
				accept=".pdf"
		    ></b-form-file>
		    <div class="mt-3">Selected file: {{ newValue.file ? newValue.file.name : '' }}</div>
		</div>

		
		<template v-if="baseInfoSet(newValue)">
			<div class="form-group">
			    <input type="text" v-model="newValue.title" class="form-control" id="inputitle" placeholder="Naam" required>
			</div>
			<div class="form-group">
			    <textarea class="form-control" rows="3" v-model="newValue.description" placeholder="Omschrijving"></textarea>
			</div>
			<div class="form-group">
			    <input type="text" v-model="newValue.year" class="form-control" id="inputitle" placeholder="Jaar" required @input="onlyNumbers" 
	                maxlength="4" >
			</div>

			<hr>
			<div class="form-group">
				<h3> Participatiescan vragen </h3>
				<template v-for="theme in scanmodel.themes">
					<h5 class="mt-3"> {{ theme.title }} </h5>
					<div class="form-check" v-for="question in theme.questions">
						<button class="btn btn-sm mb-1" :class=" isActiveQuestion(newValue, question)  ?  'btn-secondary' : 'btn-outline-secondary' " @click="updateQuestions(newValue, question)" type="button" v-html="question.title">
						</button>
					</div>
				</template>
			</div>
		</template>
	</b-modal>
</template>

<script>

    export default {
        props: [
        	'value',
	        'modal_id',
        	'scanmodel',
        	'newarticle'
        ],

        data() {
            return {
            	newValue: null
            }
        },

        mounted() {
        	this.newValue = this.value;
        },

        computed: {
			orderedArticletypes() {
				if(! this.scanmodel.articletypes.length) return ''
				return this.scanmodel.articletypes.sort( (a, b) => {
					if (a.order < b.order)
						return -1
					if (a.order > b.order)
						return 1
					return 0
				})
			},
        },

        methods: {
        	saveArticle() {
        		if (this.newarticle) {
	        		this.$emit('saveArticle', this.newValue);
        			return ''
        		}
        		this.$emit('saveArticleChanges', this.newValue);
        	},

        	toggleArticletype(article, articletype) {
        		if ( ! article.articletypes || !  article.articletypes.map( articletype => articletype.id ).includes( articletype.id ) ) {
        			article.articletypes.push(articletype)
        			return ''
        		}
        		article.articletypes.splice( article.articletypes.map( articletype => articletype.id ).indexOf(articletype.id), 1 );
        	},

	    	isSelected(article, articletype) {
	    		if ( article.articletypes && article.articletypes.map( articletype => articletype.id ).includes(articletype.id) ) return true
				return false
	    	},

	    	setlinktype(article, type) {
	    		article.linktype = type;
	    	},

	    	baseInfoSet(article) {
				return (article.articletypes && article.articletypes.length && article.linktype)
			},

			onlyNumbers: function() {
				this.newValue.year = this.newValue.year.replace(/[^0-9]/g,'');
			},

			isActiveQuestion(article, question) {
				return (article.questions.map( question => question.id ).includes(question.id))
			},

			updateQuestions(article, question) {
				if (! article.questions.map( question => question.id ).includes( question.id )) {
					article.questions.push( question );
					return ''
				}
				article.questions.splice( article.questions.map( question => question.id ).indexOf( question.id ), 1 )
			},
        }
    }
</script>