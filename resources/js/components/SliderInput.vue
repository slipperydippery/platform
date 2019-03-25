<template>
	<div class="rangeslider--container" >
		<div class="row justify-content-center">
			<div class="rangeslider--directinput">
				<div class="directinput directinput--minus clickable" @click="subtractValue()">
					-
				</div>
			    <div class="question--answer shadow" v-if="value != null">{{ value }}</div>
			    <div class="question--answer shadow question--answer__preanswer" v-else>-</div>
			    <div class="directinput directinput--plus clickable" @click="addValue()">
			    	+
			    </div>
			</div>
		</div>
	    <input type="range" 
	        min="0" max="10"
	        step="1"
	        :value="value" 
	        v-on:change="onChange($event.target.value)"
	        :disabled="disabled"
	    >

	</div>
</template>

<script>
    export default {
        props: [
	        'value',
	        'disabled'
        ],

        data() {
        	return {
        	}
        },

        mounted() {
        },

        methods: {
        	onChange(newValue) {
        		// this.value = newValue;
        		// console.log('changed');
        		this.$emit('input', newValue);
        	},

        	addValue() {
                var tempvalue = this.value;
        		if(tempvalue != null){
        			tempvalue++;
        			if(tempvalue > 10) {
        				tempvalue = 10;
        			}
        		} else {
        			tempvalue = 6;
        		}
        		this.onChange(tempvalue);
        	},

        	subtractValue() {
                var tempvalue = this.value;
        		if(tempvalue != null ){
        			tempvalue--;
        			if(tempvalue < 0) {
        				tempvalue = 0;
        			}
        		} else {
        			tempvalue = 4;
        		}
        		this.onChange(tempvalue);
        	}

        }
    }
</script>