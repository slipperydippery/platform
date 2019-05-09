<template>
	<div class="">
		<h5> <a :href="'/comparison/' + comparison.id">{{ comparison.title }}</a> </h5>
		<table class="table table-sm">
            <thead class="thead-dark">
            	<th scope="col"> Naam </th>
            	<th scope="col"> Instantie </th>
            	<th scope="col"> Gemeenten </th>
            	<th scope="col"> Antwoorden </th>
            	<th scope="col">
            	    Menu
            	</th>
            </thead>
			<tbody>
				<tr class="table-primary">
				    <th scope="col"> {{ scan.title }} </th>
				    <th scope="col"> {{ scan.instantie.title }} </th>
				    <th scope="col"> <span v-for="(district, index) in scan.districts"> {{ district.name }} <span v-if="index != scan.districts.length -1">, </span> </span> </th>
				    <th scope="col"> {{ answercount(scan) }} / {{ questioncount(scan) }} </th>
				    <th scope="col">

				    </th>
				</tr>
            	<tr v-for="scan in comparison.scans">
            		<td> {{ scan.title }} </td>
            		<td> {{ scan.instantie.title }} </td>
				    <td> <span v-for="(district, index) in scan.districts"> {{ district.name }} <span v-if="index != scan.districts.length -1">, </span> </span> </td>
            		<td> {{ answercount(scan) }} / {{ questioncount(scan) }} </td>
            		<td>
            			<div class="dropdown float-right">
            			    <button class="btn btn-secondary dropdown-toggle dropdown-toggle__round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            			        
            			    </button>
            			    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <message-user-dropdown-modal
                                    :scan = scan
                                    :comparison_id = comparison.id
                                >
                                </message-user-dropdown-modal>

            			    </div>
            			</div>

            		</td>
            	</tr>

			</tbody>
		</table>

		<hr>
	</div>

</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'workcomparison',
        	'scan'
        ],

        data() {
            return {
            	'comparison': {},
            }
        },

        mounted() {
        	this.getComparison();
        },

        computed: {
        },

        methods: {
        	getComparison() {
        		var home = this;
        		axios.get('/api/comparison/' + this.workcomparison.id)
	        		.then( response => {
	        			this.comparison = response.data
	        		})
        	},

        	answercount(thisscan){
        		var answercount = 0;
        		thisscan.answers.forEach( (thisanswer) => {
        			thisanswer.answer ? answercount++ : '';
        		} )
        		return answercount;
        	},

        	questioncount(thisscan){
        		return thisscan.answers.length;
        	},
        }
    }
</script>