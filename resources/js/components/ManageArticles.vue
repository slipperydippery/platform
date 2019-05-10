<template>
	<div class="row">
		<div class="col-12">
			<button class="btn btn-primary mb-4" v-b-modal.newArticleModal> Voeg een item toe </button>
			<b-modal size="lg" id="newArticleModal" title="Voeg een nieuw item toe" @ok="saveArticle">
				<div class="form-group">
					<label 
		                v-for="articletype in orderedArticletypes"
		                @click="toggleArticletype(newArticle, articletype)"
		                class="checkboxlabel btn mr-2 clickable "  
		                :class="{  'btn-secondary' : isSelected(articletype, newArticle), 'btn-dark' : !isSelected(articletype, newArticle) }"
		                v-b-tooltip:hover :title=" articletype.description "
					>
						{{ articletype.title }}
					</label>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend" id="button-addon3">
						<button class="btn" :class=" newArticle.linktype == 'link' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype('link')" type="button"> Link </button>
					</div>
					<div class="input-group-append">
						<button class="btn" :class=" newArticle.linktype == 'file' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype('file')" type="button"> Bestand </button>
					</div>
				</div>

				<hr>

				<div class="form-group" v-if="newArticle.linktype == 'link'">
				    <input type="text" v-model="newArticle.link" class="form-control" id="inputlink" placeholder="http://www">
				</div>
				<div class="form-group" v-if="newArticle.linktype == 'file'">
					<b-form-file
						v-model="newArticle.file"
						placeholder="Kies een bestand"
						drop-placeholder="Sleep bestand hier..."
				    ></b-form-file>
				</div>

				
				<template v-if="baseInfoSet(newArticle)">
					<div class="form-group">
					    <input type="text" v-model="newArticle.title" class="form-control" id="inputitle" placeholder="Naam" required>
					</div>
					<div class="form-group">
					    <textarea class="form-control" rows="3" v-model="newArticle.description" placeholder="Omschrijving"></textarea>
					</div>
					<div class="form-group">
					    <input type="text" v-model="newArticle.year" class="form-control" id="inputitle" placeholder="Jaar" required @input="onlyNumbers" 
			                maxlength="4" >
					</div>



					<hr>
					<div class="form-group">
						<h3> Participatiescan vragen </h3>
						<template v-for="theme in scanmodel.themes">
							<h5 class="mt-3"> {{ theme.title }} </h5>
							<div class="form-check" v-for="question in theme.questions">
								<button class="btn btn-sm mb-1" :class=" isActiveQuestion(newArticle, question)  ?  'btn-secondary' : 'btn-outline-secondary' " @click="updateQuestions(newArticle, question)" type="button" v-html="question.title">
								</button>
							</div>
						</template>
					</div>
				</template>
			</b-modal>

	        <table class="table table-sm">
	            <thead class="thead-dark">
	                <tr>
	                	<th scope="col"> Type </th>
	                	<th scope="col"> Naam </th>
	                	<th scope="col" style="width: 50%"> Omschrijving </th>
	                	<th scope="col"> Jaar </th>
	                	<th scope="col"> Vragen </th>
	            		<th> opties </th>
	                </tr>
	            </thead>
	            <tbody>
	            	<tr v-for="(article, index) in reverseOrderedArticles">
	            		<td>
	            			<template v-for="articletype in article.articletypes">
	            				<span v-html="articletype.title"></span> <br>
	            			</template>
	            		</td>
	            		<td>
	            			<a :href="article.link" v-if="article.linktype = 'link'"><span v-html="article.title"></span></a>
	            			<a href="#" v-else><span v-html="article.title"></span></a>
	            		</td>
	            		<td>
	            			<span v-html="article.description"></span>
	            		</td>
	            		<td>
	            			<span> {{ article.year }} </span>
	            		</td>
	            		<td>
	            			<template v-for="question in article.questions">
	            				<span :id="'question' + article.id + '_' + question.id" class="badge badge-pill clickable" v-html="question.id" ></span>
	            				<b-tooltip :target="'question' + article.id + '_' + question.id"> <span v-html="question.title"></span> </b-tooltip>
	            			</template>
	            		</td>
	            		<td>
	            			<div class="float-right">
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar boven" v-if="(index > 0)" @click="moveUp(article, index)">
		            				keyboard_arrow_up
	            				</i> <br>
	            				<i class="material-icons clickable" @click="$bvModal.show('editArticleModal' + article.id )" v-b-tooltip.hover title="Bewerk">
		            				edit
	            				</i> <br>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar beneden" v-if="(index < (articles.length - 1))" @click="moveDown(article, index)">
		            				keyboard_arrow_down
	            				</i> 
	            			</div>
	            		</td>
	            			<b-modal size="lg" :id="'editArticleModal' + article.id " title="Bewerk item" @ok="saveArticleChanges(article)">
	            				<div class="form-group">
	            					<label 
	            		                v-for="articletype in orderedArticletypes"
	            		                @click="toggleArticletype(article, articletype)"
	            		                class="checkboxlabel btn mr-2 clickable "  
	            		                :class="{  'btn-secondary' : isSelected(articletype, article), 'btn-dark' : !isSelected(articletype, article) }"
	            		                v-b-tooltip:hover :title=" articletype.description "
	            					>
	            						{{ articletype.title }}
	            					</label>
	            				</div>
	            				<div class="input-group mb-3">
	            					<div class="input-group-prepend" id="button-addon3">
	            						<button class="btn" :class=" article.linktype == 'link' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype('link')" type="button"> Link </button>
	            					</div>
	            					<div class="input-group-append">
	            						<button class="btn" :class=" article.linktype == 'file' ?  'btn-secondary' : 'btn-outline-secondary' " @click="setlinktype('file')" type="button"> Bestand </button>
	            					</div>
	            				</div>

	            				<hr>

	            				<div class="form-group" v-if="article.linktype == 'link'">
	            				    <input type="text" v-model="article.link" class="form-control" id="inputlink" placeholder="http://www">
	            				</div>
	            				<div class="form-group" v-if="article.linktype == 'file'">
	            					<b-form-file
	            						v-model="article.file"
	            						placeholder="Kies een bestand"
	            						drop-placeholder="Sleep bestand hier..."
	            				    ></b-form-file>
	            				</div>

	            				
	            				<template v-if="baseInfoSet(article)">
	            					<div class="form-group">
	            					    <input type="text" v-model="article.title" class="form-control" id="inputitle" placeholder="Naam" required>
	            					</div>
	            					<div class="form-group">
	            					    <textarea class="form-control" rows="3" v-model="article.description" placeholder="Omschrijving"></textarea>
	            					</div>
	            					<div class="form-group">
	            					    <input type="text" v-model="article.year" class="form-control" id="inputitle" placeholder="Jaar" required @input="onlyNumbers" 
	            			                maxlength="4" >
	            					</div>



	            					<hr>
	            					<div class="form-group">
	            						<h3> Participatiescan vragen </h3>
	            						<template v-for="theme in scanmodel.themes">
	            							<h5 class="mt-3"> {{ theme.title }} </h5>
	            							<div class="form-check" v-for="question in theme.questions">
	            								<button class="btn btn-sm mb-1" :class=" isActiveQuestion(article, question)  ?  'btn-secondary' : 'btn-outline-secondary' " @click="updateQuestions(article, question)" type="button" v-html="question.title">
	            								</button>
	            							</div>
	            						</template>
	            					</div>
	            				</template>
	            			</b-modal>
	            	</tr>
	            </tbody>
			</table>

		</div>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'workarticles',
	        'scanmodel'
        ],

        data() {
            return {
            	'articles': [],
            	'addingArticle' : false,
            	'newArticle': {
            		'title': '',
            		'description': '',
	            	'linktype': '',
            		'link': '',
	            	'file': '',
            		'year': '',
	            	'articletypes': [],
	            	'questions': [],
            	},
            	'saving': false,
            }
        },

        mounted() {
        	this.articles = this.workarticles;
        },

        computed: {
			reverseOrderedArticles() {
				function compare(a, b) {
					if (a.order < b.order)
						return 1
					if (a.order > b.order)
						return -1
					return 0
				}
			    return this.articles.sort(compare);
			},

			orderedArticles() {
				function compare(a, b) {
					if (a.order < b.order)
						return -1
					if (a.order > b.order)
						return 1
					return 0
				}
			    return this.articles.sort(compare);
			},

			orderedArticletypes() {
				return this.scanmodel.articletypes.sort( (a, b) => {
					if (a.order < b.order)
						return -1
					if (a.order > b.order)
						return 1
					return 0
				})
			},

			orderedThemes() {
				return this.scanmodel.themes.sort( (a, b) => {
					if (a.order < b.order) 
						return -1
					if (a.order > b.order)
						return 1
					return 0
				})
			},

        },

        methods: {
        	addArticle() {
        		this.addingArticle = true;
        	},

        	getArticles() {
        		var home = this;
        		axios.get('/api/article')
        		.then( response => {
        			home.articles = response.data
        		} )
        	},

        	saveArticle() {
        		if(this.saving == true) return '';
        		this.saving = true;
        		var home = this;
        		axios.post('/api/article', {
        			'article': home.newArticle,
        		})
        		.then( response => {
        			this.articles = response.data;
        			this.newArticle = {
		            		'title': '',
		            		'description': '',
		            		'year': '',
		            		'link': '',
			            	'file': '',
			            	'articletypes': [],
			            	'linktype': '',
		            	}
	        		this.addingArticle = false;
	        		this.saving = false;
        		} )
        	},

        	saveArticleChanges(article) {
        		console.log('saving')
        		if(this.saving == true) return '';
        		this.saving = true;
        		var home = this;
        		axios.patch('/api/article/' + article.id, {
        			'article': article,
        		})
        		.then( response => {
	        		this.saving = false;
        		} )
        	},

        	cancelNewArticle() {
        			this.newArticle = {
		            		'title': '',
		            		'description': ''
		            	}
	        		this.addingArticle = false;
        	},

        	updateArticle(article) {
        		var home = this;
        		axios.patch('/api/article/' + article.id, {
        			'article': article
        		})
        		.then( response => {
        			article.editable = false;
        			home.$forceUpdate();
        		} )
        	},

        	cancelEditarticle(article) {
        		article.editable = false;
        		this.$forceUpdate();
        	},

        	setEditable(article) {
        		article.editable = true;
        		this.$forceUpdate();
        	},

        	moveUp(article, index) {
        		this.sequentializeOrder();
        		var otherarticle = this.reverseOrderedArticles[index - 1];
        		var otherorder = otherarticle.order;
        		otherarticle.order = article.order;
        		article.order = otherorder;
        		this.updateArticle(article);
        		this.updateArticle(otherarticle);
        	},

        	moveDown(article, index) {
        		this.sequentializeOrder();
        		var otherarticle = this.reverseOrderedArticles[index + 1];
        		var otherorder = otherarticle.order;
        		otherarticle.order = article.order;
        		article.order = otherorder;
        		this.updateArticle(article);
        		this.updateArticle(otherarticle);
        	},

        	sequentializeOrder() {
        		this.orderedArticles.forEach( (article, index) => {
        			article.order = (index + 1);
        		})
        	},

        	handleFileUpload() {
        		console.log('handleFileUpload');
        		let files = this.$refs.file.files;
                if (!files.length)
                    return;
                this.createFile(files[0]);
        	},

        	createFile(file) {
        		console.log('createFile');
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.newArticle.file = e.target.result;
                };
                reader.readAsDataURL(file);
        	},

        	toggleArticletype(article, articletype) {
        		if ( !  article.articletypes.map( articletype => articletype.id ).includes( articletype.id ) ) {
        			article.articletypes.push(articletype)
        			return ''
        		}
        		article.articletypes.splice( article.articletypes.map( articletype => articletype.id ).indexOf(articletype.id), 1 );
        	},

        	isSelected(articletype, article) {
        		if ( article.articletypes.map( articletype => articletype.id ).includes(articletype.id) ) return true
    			return false
        	},

        	setlinktype(type) {
        		this.newArticle.linktype = type;
        	},

			onlyNumbers: function() {
				this.newArticle.year = this.newArticle.year.replace(/[^0-9]/g,'');
			},

			updateQuestions(article, question) {
				if (! article.questions.map( question => question.id ).includes( question.id )) {
					article.questions.push( question );
					return ''
				}
				article.questions.splice( article.questions.map( question => question.id ).indexOf( question.id ), 1 )
			},

			baseInfoSet(article) {
				return (article.articletypes && article.articletypes.length && article.linktype)
			},

			isActiveQuestion(article, question) {
				return (article.questions.map( question => question.id ).includes(question.id))
			}
        }
    }
</script>