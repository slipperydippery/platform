<template>
	<div class="py-2 my-4 bg-white text-secondary border shadow"  v-if="group.user && isInGroup">
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
            <strong>Aansluitcode:</strong> {{ group.code }}
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
                        <th scope="col"> Naam </th>
                        <th scope="col"> Instantie </th>
                        <th scope="col"> Antwoorden </th>
                        <th scope="col">
                            Menu
                        </th>
                    </tr>
                </thead>
	            <tbody>
                    <tr :class="{'table-primary' : isAdmin}">
                        <th scope="col"> {{ group.user.name }} </th>
                        <th scope="col">Beheerder</th>
                        <th scope="col"> {{ answercount(group.scan) }} / {{ questioncount(group.scan) }} </th>
                        <th scope="col">
                            <div class="dropdown float-right" v-if="! isAdmin">
                                <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <message-user-dropdown-modal
                                        :scan = group.scan
                                    >
                                    </message-user-dropdown-modal>
                                </div>
                            </div>
                        </th>
                    </tr>
	            	<tr v-for="scan in group.scans" v-if=" scan.id !== group.scan.id " :class="{'table-primary' : scan.user.id == user_id}">
	            		<td> {{ scan.user.name }} </td>
	            		<td> {{ scan.instantie.title }} </td>
	            		<td> {{ answercount(scan) }} / {{ questioncount(scan) }} </td>
	            		<td>
	            			<div class="dropdown float-right" v-if="scan.user.id !== user_id ">
	            			    <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            			        
	            			    </button>
	            			    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                    <message-user-dropdown-modal
                                        :scan = scan
                                    >
                                    </message-user-dropdown-modal>

                                    <promote-user-dropdown-modal
                                        :scan = scan
                                        :isAdmin = isAdmin
                                        @promoteParticipant = "promoteParticipant"
                                    >
                                    </promote-user-dropdown-modal>

                                    <remove-user-dropdown-modal
                                        :scan = scan
                                        :isAdmin = isAdmin
                                        :isSelf = " scan.user.id === user_id "
                                        @removeParticipant = "removeParticipant"
                                    >
                                    </remove-user-dropdown-modal>

	            			    </div>
	            			</div>

                            <remove-user-dropdown-modal
                                :scan = scan
                                :isAdmin = isAdmin
                                :isSelf = " scan.user.id === user_id "
                                v-if = " scan.user.id === user_id "
                                @removeParticipant = "removeParticipant"
                            >
                            </remove-user-dropdown-modal>

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
                'isInGroup': true,
            }
        },

        mounted() {
        	this.getGroup( this.group_id );
            window.Echo.private('groupupdated.' + this.group_id).listen('GroupUpdated', e => {
                console.log(e.event);
                switch( e.event ) {
                    case 'sessionaddedtogroup':
                        this.addScanToGroup( e.scan_id );
                        break;
                    case 'groupscoresupdated':
                        this.getGroup(this.group_id);
                        break;
                    case 'grouplockupdated':
                        this.getGroup(this.group_id);
                        break;
                    case 'groupadminupdated':
                        this.getGroup(this.group_id);
                        break;
                    case 'sessionremovedfromgroup':
                        this.notifyRemoved(e.scan_id);
                        this.getGroup(this.group_id);
                        break;
                }
            });
        },

        computed: {
        	isAdmin() {
        		return this.group.scan.user.id === this.user_id;
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
            addScanToGroup(scan_id) {
                var home = this;
                axios.get('api/scan/' + scan_id)
                    .then( (response) => {
                        home.group.scans.push(response.data);
                        home.notifyJoined(response.data.user.name);
                    })
            },

            notifyJoined(username) {
                this.$bvToast.toast(`${username} heeft zich aangemeld voor de groepssessie ${this.group.title}`, {
                    title: 'Nieuwe aanmelding',
                    autoHideDelay: 5000,
                    appendToast: false,
                    solid: true,
                    variant: 'primary',
                    toaster: 'b-toaster-top-full',
                })
            },

            notifyRemoved(scan_id) {
                if(scan_id == this.scan_id) {
                    this.isInGroup = false;
                    this.$bvToast.toast(`Jij bent verwijderd uit groep ${this.group.title}`, {
                        title: 'Verwijderd uit groep',
                        autoHideDelay: 5000,
                        appendToast: false,
                        solid: true,
                        variant: 'danger',
                        toaster: 'b-toaster-top-full',
                    });
                } else {
                    this.group.scans.forEach( (thisscan) => {
                        if( thisscan.id == scan_id ) {
                            this.$bvToast.toast(`${thisscan.user.name} is verwijderd uit groep ${this.group.title}`, {
                                title: 'Verwijderd uit groep',
                                autoHideDelay: 5000,
                                appendToast: false,
                                solid: true,
                                variant: 'danger',
                                toaster: 'b-toaster-top-full',
                            });
                        }
                    });
                }
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
                var home = this;
                var isSelf = (scan.user.id == this.user_id);
                axios.delete('api/scan/' + scan.id)
                    .then( (responsel => {
                    }) );
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