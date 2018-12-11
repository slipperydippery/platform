<script>
    export default {
        data() {
            return {
            	filter: '',
            	selected: []
            }
        },

        methods: {
        	toggleSelected(object) {
        		var iscontained = false;
        		this.selected.forEach( item => {
        			if( item.id == object.id ) {
        				this.selected.splice(this.selected.indexOf(item), 1);
        				iscontained = true;
        			}
        		} );
        		if( ! iscontained ) {
    	    		this.selected.push(object);
        		}
        		this.filter = '';
        	},

        	removeChecked(objectid) {
        		var objectname = 'district' + objectid;
        		this.selected.forEach( item => {
        			if( item.id == objectid ) {
        				this.selected.splice(this.selected.indexOf(item), 1);
        			}
        		} );
        		document.getElementById(objectname).checked = false;
        	},

        	isSelected(object) {
        		var iscontained = false;
        		this.selected.forEach( item => {
        			if( item.id == object.id ) {
        				iscontained = true;
        			}
        		});
        		return iscontained;
        	}
        }
    }
</script>

<style lang="scss">
	.checkboxgroup--container {
		max-height: 400px;
		overflow: hidden;
	}
	.checkboxgroup {
		height: 200px;
		overflow-y: auto;
	}
	.vueelement {
		display: unset;
	}
</style>