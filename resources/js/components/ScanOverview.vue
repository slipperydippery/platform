<template>
	<div class="py-2 my-4 bg-white text-secondary border shadow"  v-if="group.user">
        <div class="col-12 pt-2">
            <h4>
                <a href=" #scanstart " class="flex-grow-1 nowrap text-uppercase"> {{ group.title }} </a> 
                <a :href="'/scan/' + scan_id + '/edit'">
	                <i class="material-icons float-right clickable"
	                	v-b-tooltip.hover title="Bewerk sessie"
	                	v-if="isAdmin"
	            	>
	            		edit
		            </i>
	            </a>
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
            <em v-for="(district, index) in group.scan.districts"><span v-html="district.name"></span><span v-if="index !== group.scan.districts.length - 1">, </span></em>
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
                                    <promote-user-dropdown-modal
                                        scan = scan

                                    >
                                    </promote-user-dropdown-modal>

	            			        
                                    <a class="dropdown-item" @click="$bvModal.show('promotemodal' + scan.id)" v-if="isAdmin">Promoot tot beheerder</a>
                                    <portal to="modals">
                                        <b-modal
                                            :id="'promotemodal' + scan.id"
                                            :title=" 'Weet je zeker dat je ' + scan.user.name + ' tot beheerder wilt promoten?' "
                                            @ok="promoteParticipant(scan)"
                                        >
                                            <p>Je staat op het punt om de <strong>{{ scan.user.name }}</strong> tot eigenaar van dese groepssessie te promoten. Dat kan handig zijn als je het beheer graag wilt overdragen. Let er wel op dat je deze actie zelf niet ongedaan moet maken (alleen <strong>{{ scan.user.name }}</strong> kan jou hierna weer tot eigenaar promoten) </p>
                                        </b-modal>
                                    </portal>
                                    <a class="dropdown-item" @click="$bvModal.show('deletemodal' + scan.id)" v-if="isAdmin">Verwijder uit groep</a>
                                    <portal to="modals">
                                        <b-modal 
                                            :id="'deletemodal' + scan.id" 
                                            :title="'Weet je zeker dat je ' + scan.user.name + ' wilt verwijderen?' " 
                                            @ok="removeParticipant(scan)"
                                        >
                                            <p class="my-4">Je staat op het punt om <strong>{{ scan.user.name }}</strong> uit de groepssessie te verwijderen. Weet je zeker dat je dit wilt doen? </p>
                                        </b-modal>
                                    </portal>
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
                'toastCount': 0,
            }
        },

        mounted() {
        	this.getGroup( this.group_id );
        	window.Echo.private('sessionsadded.' + this.group_id).listen('SessionAddedToGroup', e => {
                this.getScan( e.scan_id );
        	});
            window.Echo.private('groupscores.' + this.group_id).listen('GroupscoresUpdated', e => {
                this.getGroup(this.group_id);
            });
            window.Echo.private('groupadminupdated.' + this.group_id).listen('GroupAdminUpdated', e => {
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
            getScan(scan_id) {
                var home = this;
                axios.get('api/scan/' + scan_id)
                    .then( (response) => {
                        home.group.scans.push(response.data);
                        home.makeToast(response.data.user.name);
                    })
            },

            makeToast(username) {
                this.$bvToast.toast(`${username} heeft zich aangemeld voor de groepssessie ${this.group.title}`, {
                    title: 'Nieuwe aanmelding',
                    autoHideDelay: 5000,
                    appendToast: false
                })
            },

        	getGroup(group_id) {
        		var home = this;
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

            removeParticipant(scan) {
                this.group.scans.splice(this.group.scans.indexOf(scan), 1);
                axios.delete('api/scan/' + scan.id);
            },

            promoteParticipant(scan) {
                var home = this;
                axios.post('api/group/' + this.group.id + '/promote', {
                        'scan' : scan
                    })
                    .then( (response) => {
                        // home.group = response.data;
                        home.getGroup( home.group.id );
                    })
            },

        	toggleLock() {
                if (this.isAdmin) {
            		this.group.unlocked = ! this.group.unlocked;
            		this.updateGroup(this.group_id);
                }
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