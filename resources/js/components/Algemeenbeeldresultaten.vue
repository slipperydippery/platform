<template>
	<div class="row">
		<div class="col-sm-12 table table__results">
	        <div class="row">
	            <div class="col-sm-2">  </div>
	            <div class="col-sm-2 table--instantie">  </div>
	            <div class="col-sm-1 table--score"> score </div>
	            <div class="col-sm-7">
	            </div>
	        </div>
            <div class="row" v-for="scan in store.group.scans">
                <div class="col-sm-2 nowrap" :class="['instantietype-' + scan.instantie.id + '-leftborder', {'owner-leftborder': isGroupOwner(scan)}]"> {{ scan.user.name }} </div>
                <div class="col-sm-2 table--instantie" v-if="isBeheerder(scan)"> Beheerder </div>
                <div class="col-sm-2 table--instantie" v-else> {{ scan.instantie.title }} </div>
                <div class="col-sm-1 table--score"> {{ scan.algemeenbeeld }} </div>
                <div class="col-sm-7">
                	<div class="resultslider">
                	    <div class="resultslider--result"
                	        :style="{ width: cssPercent(scan.algemeenbeeld), background: nullColor(scan.algemeenbeeld) }"
                	    >
                	    </div>
                	</div>
                </div>
            </div>
	    </div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
            'workscan',
            'scanmodel',
            'loggedin'
        ],

        data() {
            return {
                store,
                answers: [],
                finished: false,
            }
        },

        mounted() {
            store.scan = this.workscan;
            store.loggedin = this.loggedin ? true : false;
            if(store.scan.group_id) {
                store.isgroup = true;
                this.getGroup(this.workscan.group_id);
                window.Echo.private('algemeenbeeld.' + this.workscan.group_id).listen('AlgemeenbeeldUpdated', e => {
                    this.getGroup(this.workscan.group_id);
                });
            };
        },

        ready() {   
        },

        computed: {
        },

        methods: {
            isBeheerder(scan) {
                if(scan.id == store.group.scan_id) {
                    return true;
                }
                return false;
            },

            getScan: function() {
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/scan/' + home.workscan.uuid )
                        .then(function(response){
                            home.store.scan = response.data;
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            getAnswers: function() {
                var home = this;
                axios.get('/api/scan/' + home.workscan.uuid + '/answers')
                    .then(function(response){
                        home.answers = response.data;
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },

            getGroup: function(groupid) {
                if(store.loggedin) {
                    var home = this;
                    axios.get('/api/group/' + groupid)
                        .then(function(response){
                            home.store.group = response.data;
                            home.reorderGroup();
                        })
                        .catch(function(error){
                            console.log(error)
                        })
                }
            },

            reorderGroup: function() {
                store.group.scans.sort(function(a, b) {
                    return a.instantie_id - b.instantie_id;
                })
            }, 

            cssPercent: function (value) {
                if(value == null) {
                    return 100;
                } else {
                    return (value * 10) + '%';
                }
            },

            nullColor: function (answer) {
                var thiscolor = '';
                if(answer == null) {
                    thiscolor = 'white';
                }
                return thiscolor;
            },

            isGroupOwner(scan) {
                if(scan.id == this.store.group.user.id) {
                    return true;
                    console.log('true');
                }
                return false;
            }
        }
    }
</script>