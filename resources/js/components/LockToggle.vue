<template>
	<div class="">
        <i 
        	class="material-icons" 
        	v-b-tooltip.hover title="Sessie is vergrendeld"
        	v-if="! value"
        	@click="toggleLock()"
    	> 
    		lock 
    	</i>
	    <i 
	    	class="material-icons" 
	    	v-b-tooltip.hover title="Sessie is ontgrendeld"
	    	v-if="value"
	    	@click="toggleLock()"
		> 
			lock_open
		</i>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'value',
        ],

        data() {
            return {
            }
        },

        methods: {
        	toggleLock() {
        		this.$emit('input', !this.value)
        	}
        }
    }
</script>