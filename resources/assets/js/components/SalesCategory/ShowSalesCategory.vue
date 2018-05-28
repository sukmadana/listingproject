<template>
    <div class="card">
        <div class="header">
            <h2>
                Sales Category <small>Edit your saler category.</small>
            </h2>
            <ul class="header-dropdown m-r-0">
                <li>
                    <router-link :to="{ name: 'CreateSalesCategory' }" title="Add New Category" >
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
        
        <span class="waves-effect" v-if="message.message" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="bg-green" data-notify="message">{{message.message}}</span>
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
                        <td><router-link :to="{name: 'EditSalesCategory', params: { id: category.id }}" class="btn btn-primary">Edit</router-link> <button class="btn btn-danger" v-on:click="deleteItem(category.id)">Delete</button></td>
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
            deleteItem(id)
            {
              let uri = `/admin/api/sales-category/${id}`;
              this.axios.delete(uri).then((response) =>{
                  this.message = response.data;
                  this.fetchCategory();
              });
            }
        }
    }
</script>