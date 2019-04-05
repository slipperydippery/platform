<template>
	<div class="selectscans">
		{{ session }}
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'session'
        ],

        data() {
            return {
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        }
    }
</script>