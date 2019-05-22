<template>
	<span>
		{{ value | formatDate }}
	</span>
</template>

<script> 
    import moment from 'moment';
    moment.locale('nl');

    export default {
        props: [
        	'value'
        ],

        filters: {
            formatDate: function(value) {
                if (value) {
                    return moment(value).format("D MMMM 'YY, H:mm");
                }
            }
        },
    }
</script>