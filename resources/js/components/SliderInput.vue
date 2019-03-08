<template>
	<div class="rangeslider--container" >
	    <input type="range" 
	        min="0" max="10"
	        step="1"
	        :value="value" 
	        v-on:change="onChange($event.target.value)"
	        :disabled="disabled"
	    >
	    <span class="question--answer" v-if="value">{{ value }}</span>
	    <span class="question--answer question--answer__preanswer" v-else>-</span>

	</div>
</template>

<script>
    export default {
        props: [
	        'value',
	        'disabled'
        ],

        methods: {
        	onChange(newValue) {
        		this.$emit('input', newValue);
        	}
        }
    }
</script>