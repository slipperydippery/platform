<template>
	<div class="row">
		<div class="col-12">
			<button class="btn btn-primary mb-4" v-b-modal.newArticleModal> Voeg een item toe </button>
			<b-modal size="lg" id="newArticleModal" title="Voeg een nieuw item toe" @ok="saveArticle">
				<div class="form-group">
					<label 
		                v-for="articletype in orderedArticletypes"
		                @click="toggleArticletype(articletype)"
		                class="checkboxlabel btn mr-2 clickable "  
		                :class="{  'btn-secondary' : isSelected(articletype), 'btn-dark' : !isSelected(articletype) }"
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

				
				<template v-if="baseInfoSet">
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
								<input class="form-check-input" type="checkbox" value="" :id="'question' + question.id" @input="updateQuestions(question)">
								<label class="form-check-label" :for="'question' + question.id" v-b-tooltip:hover :title=" theme.body " v-html="question.title">
								</label>
							</div>
						</template>
					</div>
				</template>
			</b-modal>

	        <table class="table table-sm">
	            <thead class="thead-dark">
	                <tr>
	                	<th scope="col"  style="width: 30%"> Naam </th>
	                	<th scope="col"> Omschrijving </th>
	            		<th  style="col" v-for="theme in scanmodel.themes" v-b-tooltip:hover :title="theme.title"> {{ theme.id }} </th>
	                </tr>
	            </thead>
	            <tbody v-if="false">
	            	<tr v-for="(article, index) in orderedArticles">
	            		<td>
	            			<span v-html="article.title" v-if="article.editable != true"></span>
	            			<div class="form-group" v-else>
	            			    <input type="text" v-model="article.title" class="form-control" id="inputTitle" placeholder="Naam">
	            			</div>
	            		</td>
	            		<td>
	            			<span v-html="article.description" v-if="article.editable != true"></span>
	            			<div class="form-group" v-else>
	            			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="article.description" placeholder="Omschrijving"></textarea>
	            			</div>
	            		</td>
	            		<td>
	            			<div class="float-right" v-if="article.editable != true">
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar boven" v-if="(index > 0)" @click="moveUp(article, index)">
		            				keyboard_arrow_up
	            				</i> <br>
	            				<i class="material-icons clickable" @click="setEditable(article)" v-b-tooltip.hover title="Bewerk">
		            				edit
	            				</i> <br>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar beneden" v-if="(index < (articles.length - 1))" @click="moveDown(article, index)">
		            				keyboard_arrow_down
	            				</i> 
	            			</div>
	            			<div class="float-right" v-else>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Sla veranderingen op" v-if="(index > 0)" @click="updateArticle(article)">
		            				check
	            				</i> <br>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Annuleer" v-if="(index > 0)" @click="cancelEditarticle(article)">
		            				close
	            				</i>
	            			</div>
	            		</td>
	            	</tr>
	            	 <tr v-if="addingArticle">
	            		<td> 
	            			<div class="form-group">
	            			    <input type="text" v-model="newArticle.title" class="form-control" id="inputTitle" placeholder="Naam">
	            			</div>
	            		</td>
	            		<td> 
	            			<div class="form-group">
	            			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="newArticle.description" placeholder="Omschrijving"></textarea>
	            			</div>
	            		</td>
	            		<td>
	            			<div class="float-right">
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Sla veranderingen op" @click="saveArticle()">
		            				check
	            				</i>  <br>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Annuleer" @click="cancelNewArticle()">
		            				close
	            				</i>
	            			</div>
	            		</td>
	            	</tr>

	            </tbody>
			</table>
			<div class="form-group text-right" v-if="! addingArticle">
				<button class="btn btn-primary form-control" @click.prevent="addArticle">Voeg nog een kennisbank thema toe</button>
			</div>
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

			baseInfoSet() {
				return (this.newArticle.articletypes.length && this.newArticle.linktype)
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
        			this.articles.push(response.data);
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
        		var otherarticle = this.articles[index - 1];
        		var otherorder = otherarticle.order;
        		otherarticle.order = article.order;
        		article.order = otherorder;
        		this.updateArticle(article);
        		this.updateArticle(otherarticle);
        	},

        	moveDown(article, index) {
        		this.sequentializeOrder();
        		var otherarticle = this.articles[index + 1];
        		var otherorder = otherarticle.order;
        		otherarticle.order = article.order;
        		article.order = otherorder;
        		this.updateArticle(article);
        		this.updateArticle(otherarticle);
        	},

        	sequentializeOrder() {
        		this.articles.forEach( (article, index) => {
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

        	toggleArticletype(article) {
        		if ( !  this.newArticle.articletypes.includes( article ) ) {
        			this.newArticle.articletypes.push(article)
        			return ''
        		}
        		this.newArticle.articletypes.splice( this.newArticle.articletypes.indexOf(article), 1 );
        	},

        	isSelected(articletype) {
        		if ( this.newArticle.articletypes.includes(articletype) ) return true
    			return false
        	},

        	setlinktype(type) {
        		this.newArticle.linktype = type;
        	},

			onlyNumbers: function() {
				this.newArticle.year = this.newArticle.year.replace(/[^0-9]/g,'');
			},

			updateQuestions(question) {
				console.log(question.id)
			},
        }
    }
</script>