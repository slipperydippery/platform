<template>
    <section>
    	<input 
    		:value = "value"
    		type="text"
    		class="flatpickr--input"
    		ref="input"
    	>
    </section>
</template>

<script>
	import flatpickr from "flatpickr";
	import { Dutch } from "flatpickr/dist/l10n/nl.js"

    export default {
        props: {
        	value: {}
        },

        mounted() {
        	// flatpickr( this.$refs.input, {
            const fp = flatpickr( this.$refs.input, {
        		"locale": Dutch,
        		enableTime: true,
        		inline: true,
        		minDate: "today",
	    		time_24hr: true,
	    		onChange: (dateObject, dateString) => {
	    			this.$emit("input", dateString)
	    		},
	    		defaultDate: this.value
        	});
        },

        watch: {
            value(newVal, oldVal) {// watch it
                if(newVal == '') {
                    flatpickr( this.$refs.input, {
                                    "locale": Dutch,
                                    enableTime: true,
                                    inline: true,
                                    minDate: "today",
                                    time_24hr: true,
                                    onChange: (dateObject, dateString) => {
                                        this.$emit("input", dateString)
                                    },
                                    defaultDate: this.value
                                });
                }
            }
        },

        methods: {
        }
    }
</script>