<template>
	<textarea 
		v-model="scan.actionplan_youths"
		placeholder="Beschrijf hoe je jongeren gaat betrekken" 
		rows="9" 
		class="form-control" 
		@blur="saveScan"
	>
	</textarea>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'scan'
        ],

        methods: {
        	saveScan() {
        		var home = this
        		axios.patch('/api/scan/' + this.scan.id, {
        			scan: home.scan
        		})
        	},
        }
    }
</script>