<template>
	<div class="resultslider" :class=" { average : average } ">
		<div class="resultslider--result"
			:style="{ width: cssPercent(value), background: nullColor(value) }"
		>
		</div>
	</div>
</template>

<script>

    export default {
        props: {
        	'value' : Number,
            average: {
                type: Number,
                default: 0
            },
        },

        data() {
            return {
            }
        },

        mounted() {
        },

        computed: {
        	
        },

        methods: {
            cssPercent: function (value) {
                if(value == null) { 
                    return 100;
                } else {
                    return (value * 10) + '%';
                }
            },

            nullColor: function (answer) {
                var thiscolor = '';
                if(answer == null) {
                    thiscolor = 'white';
                }
                return thiscolor;
            },
        }
    }
</script>