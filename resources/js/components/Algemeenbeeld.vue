<template>
    <slider-input v-model="scan.algemeenbeeld" @input="onChange"></slider-input>
</template>

<script>
    export default {
        props: [
            'workscan',
            'loggedin'
        ],

        data() {
            return {
                scan: {}
            }
        },

        mounted() {
            this.scan = this.workscan;
        },

        methods: {
            onChange: function () {
                var home = this;
                if(this.loggedin){
                    axios.patch('/api/scan/' + this.scan.id, {
                            scan: home.scan
                        })
                        .catch( e => {
                            home.errors.push( e )
                    } )   
                }
            },
        }
    }
</script>