<template>
    <div class="card">
            <div class="header">
                <h2>
                    LISTING CATEGORY
                    <small>Edit your listing category.</small>
                </h2>
                <div class="header-dropdown m-r--5">
                    <router-link :to="{ name: 'CreateListingCategory' }" class="waves-effect" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD NEW CATEGORY" >
                        <i class="material-icons">add_circle_outline</i>
                    </router-link>                
                </div>
            </div>
            <div class="body table-responsive">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CATEGORY ICON</th>
                            <th>CATEGORY NAME</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="category in listing_category" :key="category.id">
                            <th scope="row">{{no+=1}}</th>
                            <td><i class="fa fa-2x" v-bind:class="category.category_icon"></i> </td>
                            <td>{{category.category_name}}</td>
                            <td>{{category.category_description}}</td>
                            <td>
                                <router-link :to="{name: 'EditListingCategory', params: { id: category.id }}" class="btn btn-primary">Edit</router-link> 
                                <button class="btn btn-danger waves-effect " v-on:click="confirmDelete(category.id)" >Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                <div class="center-block">
                        <ul class="pager">
                            <li><a class="waves-effect" v-on:click="fetchListingCategory(pagination.prev_page_url)">Previous</a></li>
                            
                            <li><a class="waves-effect" v-on:click="fetchListingCategory(pagination.next_page_url)">Next</a></li>
                        </ul>
                        <span>Page : {{ pagination.current_page }} of {{pagination.last_page}}</span>
                </div>
            </div>
        </div>
</template>
<script>
    export default{
        data(){
            return{
                no:0,
                listing_category:[],
                pagination:{},
                message:'',
                
            }
        },
        created(){
            this.fetchListingCategory();
        },
        methods:{
            fetchListingCategory(uri){
                uri = uri || '/api/admin/listing-category';
                this.axios.get(uri).then((response) => {
                  this.makePagination(response.data)
                  this.listing_category = response.data.data;
              });
            },
            
            makePagination(data){
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
                this.pagination=pagination;
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
                        let uri = `/api/admin/listing-category/${id}`;
                        this.axios.delete(uri).then((response) =>{
                            this.message = response.data;
                            this.$swal('Deleted', this.message.message, 'success')
                            this.fetchListingCategory();
                        });
                        
                    } 
                })
            },

            
        }
    }
</script>