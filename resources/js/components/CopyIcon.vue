<template>
	<span>
		<i class="material-icons clickable md-18"
			id="copy-icon"
			v-clipboard:copy="copy_content"
	    	v-clipboard:success="onCopy"
            ref="copyicon"

		> file_copy </i> 

		<b-tooltip ref="tooltip" :target="() => $refs.copyicon" class="clickable">
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
            	status: 'Kopieer deze link naar je klembord',
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

                setTimeout( () => { 
                    this.status='Kopieer deze link naar je klembord';
                 }, 2500);
        	}
        }
    }
</script>