<template>
	<div class="">
		<input type="text" name="datetime" v-model="datetime" hidden>
		<date-picker
			v-model="datetime"
		>
		</date-picker>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        ],

        data() {
            return {
            	'datetime': ''
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