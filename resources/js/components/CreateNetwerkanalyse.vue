<template>
    <div class="form-group py-3">
        <label for="titleInput"><h3>Titel van de analyse</h3></label>
        <input type="text" class="form-control" id="titleInput" v-model="netwerkanalyse.title" placeholder="geef je analyse een titel">
        <button class="btn btn-primary mt-3" @click="storeAnalyse"> Start de analyse </button>
    </div>

</template>

<script>
    export default {
        name: "CreateNetwerkanalyse.vue",

        props: [
            'user_id'

        ],

        data() {
            return {
                netwerkanalyse: {
                    'title': '',
                    'user_id': null
                }
            }
        },

        mounted() {
            this.netwerkanalyse.user_id = this.user_id;
        },

        methods: {
            storeAnalyse() {
                var home = this;
                axios.post('/api/netwerkanalyse/', {
                    netwerkanalyse: this.netwerkanalyse
                })
                    .then( response => {
                        console.log(response.data);
                        window.location.href = '/netwerkanalyse/' + response.data.id + '/edit';
                    } )
            }

        }

    }
</script>

<style scoped>

</style>
