<template>
	<h5> 
		<b-form-checkbox
			id="checkbox-1"
			v-model="scan.involve_youths"
			name="checkbox-1"
			value=1
			unchecked-value=0
			@change="saveScan"
		>
			Wij betrekken jongeren bij het uitwerken van de verbeterpunten
		</b-form-checkbox>

	</h5>
</template>

<script>

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