<template>
	<div class="">
		<h3>Ook interessant voor jou</h3>
		<div class="row">
			<div class="col-12">
				<div class="dropdown mb-3">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons"> search </i> Informatie per succesfactor
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a 
							class="dropdown-item" 
							href="#" 
							v-for="question in questions" 
							v-html="'Thema ' + question.theme_id + ' Vraag ' + question.order + ': ' + question.title"
							@click="setActive(question)"
						> </a>
					</div>
				</div>
				
			</div>
		</div>

		<div v-if="selectedquestion.id">
			<div class="row sidebar--item position-relative mb-3" v-for="article in filteredArticles">
				<div class="col-6">
					<img :src="'/img/questionthumbs/question' + article.questions[0].id + '.jpg'" alt="" class="img-fluid">
				</div>
				<div class="col-6 px-0 position-static">
					<div class="text-container">
						<h5> {{ article.title }} </h5>
						<p>
							{{ article.description }} <br>
						</p>
					</div>
					<a :href="'http://' + article.link " target="_blank" class="stretched-link bekijk-link badge badge-primary" v-if="article.linktype == 'link'">Bekijk</a>	
					<a :href="article.link " target="_blank" class="stretched-link bekijk-link badge badge-primary" v-else>Bekijk</a>	
				</div>
			</div>
		</div>

		<div v-else>
			<div class="row sidebar--item position-relative mb-3">
				<div class="col-6">
					<img src="/img/individueel_thumb.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-6 px-0 position-static">
					<h5>Doe een individuele scan</h5>
					<p>
						Je kunt online ook een eigen scan maken. <br>
					</p>
					<a href="/nieuwesoloscan/naam" class="stretched-link bekijk-link badge badge-primary">Bekijk</a>	
				</div>
			</div>

			<div class="row sidebar--item position-relative mb-3">
				<div class="col-6">
					<img src="/img/cijfers_thumb.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-6 px-0 position-static">
					<h5>Cijfers uit jouw regio</h5>
					<p>
						Bekijk hier hoe jouw regio presteert. <br>
					</p>
					<a href="/cijfersuitderegio" class="stretched-link bekijk-link badge badge-primary">Bekijk</a>	
				</div>
			</div>

			<div class="row sidebar--item position-relative mb-3">
				<div class="col-6">
					<img src="/img/films_thumb.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-6 px-0 position-static">
					<h5>Bekijk films</h5>
					<p>
						Wil je meer weten over de thema's van de scan? <br>
					</p>
					<a class="stretched-link bekijk-link badge badge-primary" href="/introductiefilm" data-toggle="modal" data-target="#filmsModal">Bekijk</a>
				</div>
			</div>
		</div>
	</div>

</template>

<script>

    export default {
        props: [
        	'scanmodel',
        ],

        data() {
            return {
            	'questions': [],
            	'articles': [],
            	'selectedquestion': {}
            }
        },

        mounted() {
        	this.scanmodel.themes.forEach( theme => {
        		theme.questions.forEach( question => {
        			this.questions.push( question )
        		})
        	})
        	this.scanmodel.articletypes.forEach( articletype => {
        		articletype.articles.forEach( article => {
        			this.articles.push( article )
        		})
        	})
        },

        computed: {
        	filteredArticles() {
        		return this.articles.filter( thisarticle => {
        			return thisarticle.questions.map( question => question.id ).includes(this.selectedquestion.id) ? true : ''
        		})
        	}
        },

        methods: {
        	setActive(question) {
        		this.selectedquestion = question
        	},
        }
    }
</script>