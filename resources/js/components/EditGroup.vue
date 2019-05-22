<template>
	<div class="">
        <p class="my-4">Bewerk alles</p>
    	<div class="form-group">
		    <label for="titleInput">Email address</label>
            <input id="titleInput" type="text" v-model="group.title" class="form-control">
    	</div>

    	<div class="form-group">
		    <label for="titleInput">Datum sessie</label>
            <input type="text" name="datetime" v-model="group.datetime" hidden>
            <date-picker
            	v-model="group.datetime"
            >
            </date-picker>
    	</div>
    	
    	<div class="form-group">
		    <label for="titleInput">Gemeenten</label>
            <input id="titleInput" type="text" v-model="group.title" class="form-control">
    	</div>
	</div>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'group',

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
        	saveChanges(group) {
        		console.log('saving changes for ' + group.title)
        	},
        }
    }
</script>