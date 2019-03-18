<template>
	<span>
		<i class="material-icons clickable"
			id="copy-icon"
			v-clipboard:copy="copy_content"
	    	v-clipboard:success="onCopy"
		> file_copy </i> 

		<b-tooltip :disabled.sync="disabled" ref="tooltip" target="copy-icon">
	        {{ status }}
		</b-tooltip>
	</span>
</template>

<script>
    import VueClipboard from 'vue-clipboard2'
    Vue.use(VueClipboard);

    export default {
        props: [
        	'copy_content'
        ],

        data() {
            return {
            	status: 'Gekopieerd naar het klembord!',
            	disabled: true
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        	onCopy() {
        		this.status='Gekopieerd naar het klembord!';
        		this.$refs.tooltip.$emit('open');
        		setTimeout( () => { 
	        		this.$refs.tooltip.$emit('close');
        			this.disabled=true;
        		 }, 2000);
        	}
        }
    }
</script>