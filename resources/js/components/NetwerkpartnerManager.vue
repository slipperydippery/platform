<template>
    <div class="">
        <div class="card border shadow"  v-for="leefgebied in leefgebieds" :key="'leefgebied-' +leefgebied.id">
            <div class="card-header" :class="{ 'bg-primary text-white': isActiveLeefgebied(leefgebied)}">
                {{ leefgebied.title }}
            </div>
            <div class="card-body clickable" v-if="isActiveLeefgebied(leefgebied)">
                <div class="row" v-if="! getLeefgebiedIndex(leefgebied) == 0">
                    <div class="col-12">
                        <button class="btn btn-noradius btn-outline-secondary btn-outline-secondary--nooutline mb-3" @click="activatePreviousLeefgebied(leefgebied)">
                            <i class="material-icons">
                                arrow_upward
                            </i>
                            Terug naar het vorige leefgebied
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 mb-2" v-for="organisatie in leefgebied.organisaties" :key="'organisatie-' + organisatie.id">
                        <div
                            class="border px-3 py-5 h-100 justify-content-center d-flex align-items-center"
                            :class="{ 'bg-secondary text-white': isActiveOrganisatie(organisatie)}"
                            @click="toggleActiveOrganisatie(organisatie)"
                        >
                            <span>
                                <h5 class="text-center">{{ organisatie.title }}</h5>
                                <p class="text-white" v-if="isActiveOrganisatie(organisatie)"> Wij werken samen </p>
                                <p v-else> Er bestaat geen samenwerking </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="! (getLeefgebiedIndex(leefgebied) == (leefgebieds.length - 1))">
                    <div class="col-12">
                        <button class="btn btn-noradius btn-outline-secondary mt-2" @click="activateNextLeefgebied(leefgebied)">
                            <i class="material-icons">
                                arrow_downward
                            </i>
                            Door naar het volgende leefgebied
                        </button>
                    </div>
                </div>
                <div class="mt-3 w-100" v-else>
                    <button class="btn btn-noradius btn-secondary btn-lg float-right" @click="goToOverview()"> Door naar de resultaten >> </button>
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
            'leefgebieds',
        ],

        data () {
            return {
                activeLeefgebied: {},
            }
        },

        mounted() {
            this.activeLeefgebied = this.leefgebieds[0];
        },

        methods: {
            isActiveLeefgebied(leefgebied) {
                return leefgebied.id === this.activeLeefgebied.id
            },

            isActiveOrganisatie(organisatie) {
                var isActive = false
                this.netwerkanalyse.netwerkpartners.forEach( netwerkpartner => {
                    if( netwerkpartner.organisatie_id === organisatie.id ) {
                        isActive = netwerkpartner.active
                    }
                })
                return isActive
            },

            setActiveLeefgebied(leefgebied) {
                this.activeLeefgebied = leefgebied;
            },

            getLeefgebiedIndex(leefgebied){
                return this.leefgebieds.map( thisleefgebied => thisleefgebied.id ).indexOf(leefgebied.id);
            },

            activateNextLeefgebied(leefgebied) {
                var nextLeefgebied = this.getLeefgebiedIndex(leefgebied) + 1;
                this.setActiveLeefgebied(this.leefgebieds[nextLeefgebied])
            },

            activatePreviousLeefgebied(leefgebied) {
                var nextLeefgebied = this.getLeefgebiedIndex(leefgebied) - 1;
                this.setActiveLeefgebied(this.leefgebieds[nextLeefgebied])
            },

            getRelatedNetwerkpartner(organisatie) {
                var relatedNetwerkpartner = false
                this.netwerkanalyse.netwerkpartners.forEach( netwerkpartner => {
                    if (netwerkpartner.organisatie_id === organisatie.id) {
                        relatedNetwerkpartner = netwerkpartner
                    }
                })
                return relatedNetwerkpartner
            },

            toggleActiveOrganisatie(organisatie) {
                var relatedNetwerkpartner = this.getRelatedNetwerkpartner(organisatie)
                relatedNetwerkpartner.active = ! relatedNetwerkpartner.active
                this.updateNetwerkpartner((relatedNetwerkpartner))
                this.$forceUpdate()
            },

            updateNetwerkpartner(netwerkpartner) {
                var home = this
                axios.patch('/api/netwerkpartner/' + netwerkpartner.id, {
                    netwerkpartner: netwerkpartner
                })
                    .then( response => {
                        console.log(response.data)
                    } )
            },

            goToOverview() {
                window.location.href = "/netwerkanalyse/" + this.netwerkanalyse.id
            }
        }


    }
</script>

<style scoped>

</style>
