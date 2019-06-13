<template>
	<div class="">
		<input type="text" name="datetime" v-model="datetime" hidden>
		<date-picker
			v-model="datetime"
            @input="dateSet"
		>
		</date-picker>
        <button class="btn btn-secondary clickable mt-2" @click.prevent="clearDate" v-if="! nodate">Ik wil later een datum vaststellen</button>
        <button class="btn btn-secondary mt-2" v-else disabled> Datum wordt later bepaald </button>
	</div>
</template>

<script>

    export default {
        props: [
        ],

        data() {
            return {
            	'datetime': '',
                nodate: false,
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
            clearDate() {
                this.datetime = ''
                this.nodate = true
            },

            dateSet() {
                this.nodate = false
            }
        }
    }
</script>