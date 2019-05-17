<template>
	<div class="resultslider average">
		<div class="resultslider--result"
			:style="{ width: cssPercent(value), background: nullColor(value) }"
		>
		</div>
	</div>
</template>

<script>

    export default {
        props: [
        	'value',
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