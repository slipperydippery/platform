<template>
	<div class="countdown d-flex flex-column text-center">

        <div class="countdown--block align-self-center nowrap px-4 py-2 shadow clickable" v-if="! started" @click="startTimer">
            start de tijd
        </div>
        <div class="countdown--block align-self-center nowrap px-4 py-2 shadow" v-if="started">
            <span class="digit">{{ minutes }}</span>:<span class="digit">{{ seconds }}</span>
        </div> 
        <div class="countdown--span font-italic text-muted mt-2">Probeer dit onderdeel binnen de tijd af te ronden</div>
	</div>
</template>

<script>
   export default {
        props: {
	        date: String,
            autostart:  {
                type: Boolean,
                default: true
            }
        },

        data() {
            return {
            	now: Math.trunc((new Date()).getTime() / 1000),
            	event: 0,
                started: false,
            }
        },

        mounted() {
            this.started = this.autostart;
        	this.countdown();
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
            startTimer() {
                this.started = true;
                this.countdown();
            },

            countdown() {
                this.event = parseInt(this.now) + parseInt(this.date);
                window.setInterval(() => {
                    this.now = Math.trunc((new Date()).getTime() / 1000);
                    if(parseInt(this.now) >= parseInt(this.event)){
                        this.event = this.now;
                    }
                }, 1000);
            }
        }
    }
</script>