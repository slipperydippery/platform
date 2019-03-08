<template>
	<div class="countdown">
		<div class="block" title="Deze klok is handig bij het uitvoeren van de scan in groepsverband.">
			<span class="digit">{{ minutes }}</span> : 
			<span class="digit">{{ seconds }}</span>
		</div>
	</div>
</template>

<script>
   export default {
        props: [
	        'date'
        ],

        data() {
            return {
            	now: Math.trunc((new Date()).getTime() / 1000),
            	event: 0,
            }
        },

        mounted() {
        	this.event = parseInt(this.now) + parseInt(this.date);
        	window.setInterval(() => {
				this.now = Math.trunc((new Date()).getTime() / 1000);
				if(parseInt(this.now) >= parseInt(this.event)){
					this.event = this.now;
				}
        	}, 1000)
        },

        ready() {   
        },

        computed: {
        	calculatedDate () {
				// this.event = Math.trunc(Date.parse(this.event) / 1000)
				return this.event
        	},
        	seconds () {
				return ('00' + ((this.calculatedDate - this.now) % 60)).slice(-2)
        	},
        	minutes () {
				return Math.trunc((this.calculatedDate - this.now) / 60) % 60
        	},
        	hours () {
				return Math.trunc((this.calculatedDate - this.now) / 60 / 60) % 24
        	},
        	days () {
				return Math.trunc((this.calculatedDate - this.now) / 60 / 60 / 24)
        	},

        	leftPad: function (value) {
        	    return ('000'+value).slice(-3);
        	},
        },

        methods: {
        }
    }
</script>