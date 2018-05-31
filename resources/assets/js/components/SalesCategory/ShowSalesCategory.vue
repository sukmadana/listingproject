<template>
    <div class="card">
        <div class="header">
            <h2>
                Sales Category <small>Edit your saler category.</small>
            </h2>
            <ul class="header-dropdown m-r-0">
                <li>
                    
                    <router-link :to="{ name: 'CreateSalesCategory' }" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD NEW CATEGORY" >
                        <i class="material-icons">add_circle_outline</i>
                    </router-link>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">help_outline</i>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="body table-responsive">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CATEGORY NAME</th>
                        <th>COMMITION (%)</th>
                        <th>SALARY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category in categories.sales_category">
                        <th scope="row">{{ no++ }}</th>
                        <td>{{ category.sales_category_name }}</td>
                        <td>{{category.commition}}</td>
                        <td>{{ category.salary }}</td>
                        <td>
                            <router-link :to="{name: 'EditSalesCategory', params: { id: category.id }}" class="btn btn-primary">Edit</router-link> 
                            <button class="btn btn-danger waves-effect " v-on:click="confirmDelete(category.id)" >Delete</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                no:1,
                categories:[],
                message:''
            }
        },
        created(){
            this.fetchCategory();
        },

        methods:{
            fetchCategory(){
                let uri = '/admin/api/sales-category';
                this.axios.get(uri).then((response) => {
                  this.categories = response.data;
              });
            },
            confirmDelete(id){
                this.$swal({
                title: 'Are you sure?',
                text: 'You can\'t revert your action',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, Keep it!',
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                showCloseButton: true,
                showLoaderOnConfirm: true
                }).then((result) => {
                    if(result.value) {
                        let uri = `/admin/api/sales-category/${id}`;
                        this.axios.delete(uri).then((response) =>{
                            this.message = response.data;
                            this.$swal('Deleted', this.message.message, 'success')
                            this.fetchCategory();
                        });
                        
                    } 
                })
            }
        }
    }
</script>