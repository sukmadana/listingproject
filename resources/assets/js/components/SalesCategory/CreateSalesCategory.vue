<template>
    <div class="card">
        <div class="header">
            <h2>ADD NEW</h2>
        </div>
        <div class="body">
            <form id="form_advanced_validation" v-on:submit.prevent="addSalesCategory()" novalidate="novalidate">
                <div class="form-group form-float">
                    <div class="form-line error">
                        <input type="text" class="form-control" v-model="sales_category.sales_category_name" maxlength="190" required="" aria-required="true" aria-invalid="true">
                        <label class="form-label">Sales Category Name</label>
                    </div>
                    <div class="help-info">Max. 190 characters</div>
                <label id="minmaxlength-error" class="error" for="minmaxlength" style="display: block;">This field is required.</label>
                </div>
                
                <div class="form-group form-float">
                    <div class="form-line error">
                        <input type="number" class="form-control" v-model="sales_category.commition" required="" aria-required="true">
                        <label class="form-label">Commition (%)</label>
                    </div>
                    <div class="help-info">Numbers only</div>
                <label id="number-error" class="error" for="number">This field is required.</label>
                </div>

                <div class="form-group form-float">
                    <div class="form-line error">
                        <input type="number" class="form-control" v-model="sales_category.salary" required="" aria-required="true">
                        <label class="form-label">Salary</label>
                    </div>
                    <div class="help-info">Numbers only</div>
                <label id="number-error" class="error" for="number">This field is required.</label>
                </div>
                
                <button class="btn btn-primary waves-effect" type="submit"><i class="material-icons">add_circle_outline</i> ADD NEW</button>
                <router-link :to="{ name: 'SalesCategory' }" class="btn btn-default waves-effect" title="Back to Sales Category" >
                    BACK
                </router-link>
            </form>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                sales_category:{}
            }
        },
        methods:{
            addSalesCategory(){
                let uri = '/admin/api/sales-category';
                this.axios.post(uri, this.sales_category).then((response) => {
                this.$router.push({name: 'SalesCategory'})
                })
            }
        } 
    }
</script>