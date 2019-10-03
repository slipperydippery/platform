<template>
    <div class="">
        <table class="table table-bordered border shadow">
            <thead>
                <tr class="bg-primary text-white">
                    <th v-for="leefgebied in leefgebieds">
                        {{ leefgebied.title }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr" v-for="organisatieNr in (maxOrganisaties)">
                    <td
                        v-for="leefgebied in leefgebieds"
                        :class="{'bg-info' : ! netwerkpartnerActiveByLeefgebiedAndNumber(leefgebied, (organisatieNr - 1)),
                            'text-muted' : netwerkpartnerActiveByLeefgebiedAndNumber(leefgebied, (organisatieNr - 1))}"

                    >
                        {{ organisatieTitleByLeefgebiedAndNumber(leefgebied, (organisatieNr - 1)) }}
                    </td>
                </tr>
            </tbody>
        </table>
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

        computed: {
            maxOrganisaties() {
                var max = 0
                this.leefgebieds.forEach( thisleefgebied => {
                    max = (thisleefgebied.organisaties.length > max) ? thisleefgebied.organisaties.length : max
                } )
                return max
            }
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

            netwerkpartnerActiveByLeefgebiedAndNumber(leefgebied, number) {
                if(typeof leefgebied.organisaties[number] !== 'undefined')
                {
                    var organisatie = leefgebied.organisaties[number];
                    var netwerkpartner = this.getRelatedNetwerkpartner(organisatie)
                    return netwerkpartner.active

                }
                return true
            },

            organisatieTitleByLeefgebiedAndNumber(leefgebied, number) {
                if(typeof leefgebied.organisaties[number] !== 'undefined')
                {
                    var organisatie = leefgebied.organisaties[number];
                    return organisatie.title

                }
                return ''
            },

            goToOverview() {
                window.location.href = "/netwerkanalyse/" + this.netwerkanalyse.id
            }
        }


    }
</script>

<style scoped>

</style>
