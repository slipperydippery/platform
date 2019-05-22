<template>
	<span>
		<span 
			class="reveal-hidden-child clickable"
			@click="toggleEditing"
			v-if="!editing"
		>
			{{ value }}
		    <i 
		    	class="material-icons hidden-child"
		    	v-if="isAdmin"
			>
				edit
		    </i>
		</span>
		<span >
		    <date-picker
		    	v-model="value"
		    	:inline=false
		    >
		    </date-picker>
	    </span>

	</span>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
	        'value',
	        'isAdmin'
        ],

        data() {
            return {
            	'editing': false,
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        	toggleEditing() {
        		// this.editing = ! this.editing
        	}
        }
    }
</script>