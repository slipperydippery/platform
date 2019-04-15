<template>
	<div class="py-2 my-4 bg-white text-secondary border shadow"  v-if="group.user">
        <div class="col-12 pt-2">
            <h4>
                <a href=" #scanstart " class="flex-grow-1 nowrap text-uppercase"> {{ group.title }} </a> 
                <i 
                	class="material-icons float-right" 
                	v-b-tooltip.hover title="Sessie is vergrendeld"
                	:class="{clickable: isAdmin}"
                	v-if="! group.unlocked"
                	@click="toggleLock()"
            	> 
            		lock 
            	</i>
        	    <i 
        	    	class="material-icons float-right" 
        	    	v-b-tooltip.hover title="Sessie is ontgrendeld"
        	    	:class="{clickable: isAdmin}"
        	    	v-if="group.unlocked"
        	    	@click="toggleLock()"
        		> 
        			lock_open
        		</i>
	        </h4>
        </div>
        <div class="col-12">
            <strong>Gemeenten: </strong>
            <em v-for="district in group.scan.districts" v-html="district.name"> </em>
            <br>
            <strong>Datum sessie:</strong> {{ group.datetime }}
            <br>
            <span class="pt-2 d-inline-block small">Gebruik onderstaande link om jouw netwerkpartners voor deze sessie uit te nodigen:</span>
            <br>
            <span class="text-nowrap small">
                <span class="" id="groupcode" v-html="joinLink"> </span> 
                <copy-icon
                    :copy_content= 'joinLink'
                >
                </copy-icon>
            </span>
            <br>
        </div>

        <div class="col-12 my-2 d-flex justify-content-end">
            <a href="#"  class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm" data-toggle="modal" :data-target="'#voorbeeldmail' + group_id">Voorbeeld e-mail</a>
            
            <a :href="resultsLink" class="btn btn-outline-secondary btn-outline-secondary--nooutline btn-sm">Bekijk resultaten</a>
            <a :href="startLink" class="btn btn-outline-secondary btn-sm">Start sessie</a>
        </div>

        <div class="col-12">
	        <table class="table table-sm">
	            <thead class="thead-dark">
	                <tr>
	                    <th scope="col">#</th>
	                    <th scope="col"> {{ group.user.name }} </th>
	                    <th scope="col">Beheerder</th>
	                    <th scope="col"> {{ answercount(group.scan) }} / {{ questioncount(group.scan) }} </th>
	                    <th scope="col">
	                        <div class="dropdown float-right" v-if="! isAdmin">
	                            <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                
	                            </button>
	                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

	                                <a class="dropdown-item" href="#">Stuur bericht</a>

	                            </div>
	                        </div>
	                    </th>
	                </tr>
	            </thead>
	            <tbody>
	            	<tr v-for="scan in group.scans" v-if=" scan.id !== group.scan.id ">
	            		<th scope="row">1</th>
	            		<td> {{ scan.user.name }} </td>
	            		<td> {{ scan.instantie.title }} </td>
	            		<td> {{ answercount(scan) }} / {{ questioncount(scan) }} </td>
	            		<td>
	            			<div class="dropdown float-right" v-if="scan.user.id !== user_id ">
	            			    <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            			        
	            			    </button>
	            			    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	            			        <a class="dropdown-item" href="#">Stuur bericht</a>
	            			        <a class="dropdown-item" href="#" data-toggle="modal" :data-target="'#confirmpromote' + scan.id " v-if="isAdmin">Promoot tot eigenaar</a>
	            			        <a class="dropdown-item" href="#" data-toggle="modal" :data-target="'#confirmdelete' + scan.id " v-if="isAdmin">Verwijder uit groep</a>
	            			    </div>
	            			</div>

            			    <button type="button" class="close mr-2" aria-label="Close" data-toggle="modal" :data-target="'#confirmdelete' + scan.id " v-else>
            			          <span aria-hidden="true">&times;</span>
            			    </button>
	            		</td>
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
	        'scan_id',
	        'group_id',
	        'user_id'
        ],

        data() {
            return {
            	'scan' : {},
            	'group' : {},
            }
        },

        mounted() {
        	this.getGroup( this.group_id );
        	window.Echo.private('sessionsadded.' + this.group_id).listen('SessionAddedToGroup', e => {
        	    this.getGroup(this.group_id);
        	});
        	window.Echo.private('groupscores.' + this.group_id).listen('GroupscoresUpdated', e => {
        	    this.getGroup(this.group_id);
        	});
        },

        computed: {
        	isAdmin() {
        		if (this.group.user) {
	        		return this.group.scan.user.id === this.user_id;
        		}
        		return false;
        	},

        	 joinLink() {
        	 	return window.location.protocol + '//' + window.location.hostname + '/groep/' + this.group_id + '/sluitaan/' + this.group.code;
        	 },

        	 resultsLink() {
        	 	return window.location.protocol + '//' + window.location.hostname + '/sessie/' + this.scan_id + '/afgerond/';
        	 },

        	 startLink() {
        	 	return window.location.protocol + '//' + window.location.hostname + '/scan/' + this.scan_id + '/start';
        	 },
        },

        methods: {
        	getGroup(group_id) {
        		var home = this;
        		console.log(group_id);
        		axios.get('api/group/' + group_id)
        			.then( (response) => {
        				home.group = response.data;
        			});
        	},

        	updateGroup(group_id) {
        		var home = this;
        		axios.patch('api/group/' + group_id, {
        			'group' : home.group
        		})
        	},

        	getScan() {
	        	var home = this;
        		axios.get('/api/scan/' + home.scan_id)
	    			.then( (response) => {
	    				console.log(response);
        				home.scan = response.data;
        				home.getGroup(home.scan.group_id)
    			})
        	},

        	toggleLock() {
        		this.group.unlocked = ! this.group.unlocked;
        		this.updateGroup(this.group_id);
        	},

        	answercount(thisscan){
        		var answercount = 0;
        		thisscan.answers.forEach( (thisanswer) => {
        			thisanswer.answer ? answercount++ : '';
        		} )
        		return answercount;
        	},

        	questioncount(thisscan){
        		return thisscan.answers.length;
        	},
        },
    }
</script>