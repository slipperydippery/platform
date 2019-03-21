<template>
	<div class="rangeslider--container" >
		<div class="row justify-content-center">
			<div class="rangeslider--directinput">
				<div class="directinput directinput--minus clickable" @click="subtractValue()">
					-
				</div>
			    <div class="question--answer" v-if="currentvalue != null">{{ value }}</div>
			    <div class="question--answer question--answer__preanswer" v-else>-</div>
			    <div class="directinput directinput--plus clickable" @click="addValue()">
			    	+
			    </div>
			</div>
		</div>
	    <input type="range" 
	        min="0" max="10"
	        step="1"
	        :value="currentvalue" 
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
        		'currentvalue': 5,
        	}
        },

        mounted() {
        		this.currentvalue = this.value;
        },

        methods: {
        	onChange(newValue) {
        		this.currentvalue = newValue;
        		console.log('changed');
        		this.$emit('input', newValue);
        	},

        	addValue() {
        		if(this.currentvalue != null){
        			this.currentvalue++;
        			if(this.currentvalue > 10) {
        				this.currentvalue = 10;
        			}
        		} else {
        			this.currentvalue = 6;
        		}
        		this.onChange(this.currentvalue);
        	},

        	subtractValue() {
        		if(this.currentvalue != null ){
        			this.currentvalue--;
        			if(this.currentvalue < 0) {
        				this.currentvalue = 0;
        			}
        		} else {
        			this.currentvalue = 4;
        		}
        		this.onChange(this.currentvalue);
        	}

        }
    }
</script>