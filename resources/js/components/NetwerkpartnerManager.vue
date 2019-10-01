<template>
    <div class="">
        <div class="card"  v-for="instantie in instanties" key="instantie.id">
            <div class="card-header clickable" :class="{ 'bg-primary text-white': isActiveInstantie(instantie)}" @click="setActiveInstantie(instantie)">
                {{ instantie.title }}
            </div>
            <div class="card-body clickable" v-if="isActiveInstantie(instantie)">
                <div class="row">
                    <div class="col-3 mb-2" v-for="divisie in instantie.divisies" key="divisie.id">
                        <div
                            class="border px-3 py-5 h-100 justify-content-center d-flex align-items-center"
                            :class="{ 'bg-primary text-white': isActiveDivisie(divisie)}"
                            @click="toggleActiveDivisie(divisie)"
                        >
                            <h5 class="text-center">{{ divisie.title }} {{ isActiveDivisie(divisie) }} </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "NetwerkpartnerManager.vue",

        props: [
            'netwerkanalyse',
            'instanties',
        ],

        data () {
            return {
                activeInstantie: {},
            }
        },

        mounted() {
            this.activeInstantie = this.instanties[0];
        },

        methods: {
            isActiveInstantie(instantie) {
                return instantie.id == this.activeInstantie.id ? true : false
            },

            isActiveDivisie(divisie) {
                this.netwerkanalyse.netwerkpartners.forEach( netwerkpartner => {
                        if( netwerkpartner.divisie_id == divisie.id ) {
                            console.log(netwerkpartner.divisie_id + ' - ' + divisie.id)
                            console.log(netwerkpartner.active ? 'true' : 'false')
                            return netwerkpartner.active ? 'true' : 'false'
                        }
                })
            },

            setActiveInstantie(instantie) {
                this.activeInstantie = instantie;
            },

            toggleActiveDivisie(divisie) {
                console.log('toggling')
                this.netwerkanalyse.netwerkpartners.forEach( netwerkpartner => {
                    if( netwerkpartner.divisie_id == divisie.id ) {
                        console.log('found')
                        netwerkpartner.active = ! netwerkpartner.active
                    }
                } )
                this.$forceUpdate()
            }
        }


    }
</script>

<style scoped>

</style>
