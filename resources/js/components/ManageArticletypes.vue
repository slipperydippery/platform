<template>
	<div class="row">
		<div class="col-12">
	        <table class="table table-sm">
	            <thead class="thead-dark">
	                <tr>
	                	<th scope="col"  style="width: 30%"> Naam </th>
	                	<th scope="col"> Omschrijving </th>
	            		<th  style="width: 7%"> opties </th>
	                </tr>
	            </thead>
	            <tbody>
	            	<tr v-for="(articletype, index) in orderedArticletypes">
	            		<td>
	            			<span v-html="articletype.title" v-if="articletype.editable != true"></span>
	            			<div class="form-group" v-else>
	            			    <input type="text" v-model="articletype.title" class="form-control" id="inputTitle" placeholder="Naam">
	            			</div>
	            		</td>
	            		<td>
	            			<span v-html="articletype.description" v-if="articletype.editable != true"></span>
	            			<div class="form-group" v-else>
	            			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="articletype.description" placeholder="Omschrijving"></textarea>
	            			</div>
	            		</td>
	            		<td>
	            			<div class="float-right" v-if="articletype.editable != true">
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar boven" v-if="(index > 0)" @click="moveUp(articletype, index)">
		            				keyboard_arrow_up
	            				</i> <br>
	            				<i class="material-icons clickable" @click="setEditable(articletype)" v-b-tooltip.hover title="Bewerk">
		            				edit
	            				</i> <br>
	            				<i class="material-icons clickable" v-b-tooltip.hover title="Verplaats naar beneden" v-if="(index < (articletypes.length - 1))" @click="moveDown(articletype, index)">
		            				keyboard_arrow_down
	            				</i> 
	            			</div>
	            			<div class="" v-else>
		            			<button type="button" class="close" aria-label="Check" @click="updateArticletype(articletype)">
		            				<span aria-hidden="true">&#10004;</span>
		            			</button> <br>
			            			<button type="button" class="close" aria-label="Check" @click="cancelEditarticletype(articletype)">
		            				<span aria-hidden="true">&times;</span>
		            			</button>
	            			</div>
	            		</td>
	            	</tr>
	            	<tr v-if="addingArticletype">
	            		<td> 
	            			<div class="form-group">
	            			    <input type="text" v-model="newArticletype.title" class="form-control" id="inputTitle" placeholder="Naam">
	            			</div>
	            		</td>
	            		<td> 
	            			<div class="form-group">
	            			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="newArticletype.description" placeholder="Omschrijving"></textarea>
	            			</div>
	            		</td>
	            		<td>
	            			<button type="button" class="check" aria-label="Check" @click="saveArticletype()">
	            				<span aria-hidden="true">&#10004;</span>
	            			</button>
	            		</td>
	            	</tr>

	            </tbody>
			</table>
			<div class="form-group text-right" v-if="! addingArticletype">
				<button class="btn btn-primary form-control" @click.prevent="addArticletype">Voeg nog een kennisbank thema toe</button>
			</div>
		</div>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'workarticletypes'
        ],

        data() {
            return {
            	'articletypes': [],
            	'addingArticletype' : false,
            	'newArticletype': {
            		'title': '',
            		'description': ''
            	}
            }
        },

        mounted() {
        	this.articletypes = this.workarticletypes;
        },

        computed: {
			orderedArticletypes: function() {
				function compare(a, b) {
					if (a.order < b.order)
					return -1;
					if (a.order > b.order)
					return 1;
				return 0;
				}

			    return this.articletypes.sort(compare);
			}
        },

        methods: {
        	addArticletype() {
        		this.addingArticletype = true;
        	},

        	getArticletypes() {
        		var home = this;
        		axios.get('/api/articletype')
        		.then( response => {
        			home.articletypes = response.data
        		} )
        	},

        	saveArticletype() {
        		var home = this;
        		axios.post('/api/articletype', {
        			'articletype': home.newArticletype,
        		})
        		.then( response => {
        			this.articletypes.push(response.data);
        			this.newArticletype = {
		            		'title': '',
		            		'description': ''
		            	}
	        		this.addingArticletype = false;
        		} )
        	},

        	updateArticletype(articletype) {
        		var home = this;
        		axios.patch('/api/articletype/' + articletype.id, {
        			'articletype': articletype
        		})
        		.then( response => {
        			articletype.editable = false;
        			home.$forceUpdate();
        		} )
        	},

        	cancelEditarticletype(articletype) {
        		articletype.editable = false;
        		this.$forceUpdate();
        	},

        	setEditable(article) {
        		article.editable = true;
        		this.$forceUpdate();
        	},

        	moveUp(articletype, index) {
        		var otherarticletype = this.articletypes[index - 1];
        		var otherorder = otherarticletype.order;
        		otherarticletype.order = articletype.order;
        		articletype.order = otherorder;
        		this.updateArticletype(articletype);
        		this.updateArticletype(otherarticletype);
        	},

        	moveDown(articletype, index) {
        		var otherarticletype = this.articletypes[index + 1];
        		var otherorder = otherarticletype.order;
        		otherarticletype.order = articletype.order;
        		articletype.order = otherorder;
        		this.updateArticletype(articletype);
        		this.updateArticletype(otherarticletype);
        	},
        }
    }
</script>