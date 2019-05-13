	<template>
	<div class="row">
		<div class="col-12">
			<button class="btn btn-secondary mb-4" v-b-modal.newArticleModal> Voeg een item toe </button>
			<edit-article-modal
				:value = "newArticle"
				:modal_id = "'newArticleModal'"
				:scanmodel = "this.scanmodel"

				:newarticle = true
				@saveArticle = "saveArticle"
				@saveArticleChanges = "saveArticleChanges"
			>
			</edit-article-modal>

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

	            <tbody v-if="articles && articles.length">
	            	<tr v-for="(article, index) in reverseOrderedArticles">
	            		<td>
	            			<template v-for="articletype in article.articletypes">
	            				<span v-html="articletype.title"></span> <br>
	            			</template>
	            		</td>
	            		<td>
	            			<a :href="'//' + article.link" v-if="article.linktype == 'link'" target="_blank"><span v-html="article.title"></span></a>
	            			<a :href="article.link" v-if="article.linktype == 'file'" target="_blank"><span v-html="article.title"></span></a>
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
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar beneden" v-if="(index < (reverseOrderedArticles.length - 1))" @click="moveDown(article, index)">
		            				keyboard_arrow_down
	            				</i> 
		            			<edit-article-modal
		            				:value = "article"
		            				:modal_id = "'editArticleModal' + article.id "
		            				:scanmodel = "scanmodel"

		            				:newarticle = false
		            				@saveArticle = "saveArticle"
		            				@saveArticleChanges = "saveArticleChanges"
		            			>
		            			</edit-article-modal>
	            			</div>
	            		</td>
	            		</tr>
            				
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
            	articles: null,
            	addingArticle : false,
            	newArticle: {
            		title: '',
            		description: '',
	            	linktype: '',
            		link: '',
	            	file: '',
            		year: '',
	            	articletypes: [],
	            	questions: [],
            	},
            	saving: false,
            }
        },

        mounted() {
        	// this.articles = this.workarticles;
        	this.getArticles();
        },

        computed: {
			reverseOrderedArticles() {
				return this.orderedArticles.reverse()
			},

			orderedArticles() {
				// return this.articles;
				// return this.articles.sort((a, b) => a.order - b.order );
				function compare(a, b) {
					console.log('---')
					console.log(a.order)
					console.log(b.order)
				    if (a.order < b.order){
						console.log('-1')
				        return -1;
				    }
				    if (a.order > b.order){
						console.log('1')
				        return 1;
				    }
					console.log('0')
				    return 0;
				}

				return this.articles.sort(compare);
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

        	saveArticle(article) {
        		if(this.saving == true) return '';
        		this.saving = true;
        		var home = this;
        		var formData = new FormData();
        		formData.append('pdf', article.file)
        		formData.append('article', JSON.stringify(article))
        		axios.post('/api/article', formData, {
				    headers: {
				      'Content-Type': 'multipart/form-data'
				    }
				})
        		.then( response => {
        			this.articles = response.data;
        			this.newArticle = {
	            		title: '',
	            		description: '',
		            	linktype: '',
	            		link: '',
		            	file: '',
	            		year: '',
		            	articletypes: [],
		            	questions: [],
		            	}
	        		this.addingArticle = false;
	        		this.saving = false;
        		} )
		        .catch(function () {
	        		this.addingArticle = false;
	        		this.saving = false;
					console.log('FAILURE!!');
		        });
        	},

        	saveArticleChanges(article) {
        		if(this.saving == true) return '';
        		this.saving = true;
        		var home = this;
        		var formData = new FormData();
        		formData.append('pdf', article.file)
        		formData.append('article', JSON.stringify(article))
        		axios.post('/api/articlepostpatch', formData, {
				    headers: {
				      'Content-Type': 'multipart/form-data'
				    }
        		})
        		.then( response => {
        			this.articles = response.data;
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
        		var formData = new FormData();
        		formData.append('article', JSON.stringify(article))
        		axios.post('/api/articlepostpatch/', formData, {
				    headers: {
				      'Content-Type': 'multipart/form-data'
				    }
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

        	onImageChange(e) {
        		console.log(e);
        	    let files = e.target.files || e.dataTransfer.files;
        	    if (!files.length)
        	        return;
        	    this.createImage(files[0]);
        	},

        	createImage(file) {
        	    let reader = new FileReader();
        	    reader.onload = (e) => {
        	        this.newArticle.file = e.target.result;
        	    };
        	    reader.readAsDataURL(file);
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



        }
    }
</script>