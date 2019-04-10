<template>
	<div class="card">
		<div class="card-header">
			Basis gegevens
		</div>
		<div class="card-body">
			<div class="form-group">
			    <label for="title">Naam</label>
			    <input type="text" class="form-control" v-model="scan.title">
			</div>
			<div class="form-group">
			    <label for="title">Instantie</label>
			    <select class="form-control" v-model="scan.instantie_id">
					<option disabled value=""> </option>
					<option v-for="instantie in instanties" :value="instantie.id"> {{ instantie.title }} </option>
			    </select>
			</div>
			<div class="form-group">
			    <button class="btn btn-primary form-control" @click="updateScan()" > Sla veranderingen op </button>
			</div>
		</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'instanties',
	        'districts',
	        'scan_id'
        ],

        data() {
            return {
            	'scan' : {},
            	'selectedinstantie' : {}
            }
        },

        mounted() {
        	this.getScan();
        },

        computed: {
        },

        methods: {
        	getScan() {
        		var home = this;
        		axios.get('/api/scan/' + home.scan_id)
        			.then( (response) => {
        				home.scan = response.data
        			})
        	},

        	updateScan() {
        		var home = this;
        		axios.patch('/api/scan/' + home.scan_id, {
        			scan: home.scan
        		})
                .then(function (response) {
                    window.location.href = '/'; 
                })
        	}
        }
    }
</script>