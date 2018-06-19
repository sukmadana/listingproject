<template>
    <div class="card">
        <div class="header">
            <h2>
                FEATURE MANAGEMENT
                <small>Edit your feature</small>
            </h2>
            <div class="header-dropdown m-r--5">
                <router-link :to="{ name: 'CreateFeature' }" class="waves-effect material-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD NEW FEATURE" >
                    <i class="material-icons">add_circle_outline</i>
                </router-link>                
            </div>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ICON</th>
                            <th>FEATURE NAME</th>
                            <th>CATEGORY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="feature in features" :key="feature.id">
                            <td>{{no++}}</td>
                            <td><i class="fa fa-2x" v-bind:class="feature.features_icon"></i></td>
                            <td>{{feature.features_name}}</td>
                            <td>{{feature.listing_category.category_name}}</td>
                            <td>
                                <router-link :to="{name: 'EditFeature', params: { id: feature.id }}" class="btn btn-primary">Edit</router-link> 
                                <button class="btn btn-danger waves-effect " v-on:click="confirmDelete(feature.id)" >Delete</button>
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
    </div>
</template>
<script>
    export default{
        data(){
            return{
                no:0,
                features:[],
                pagination:{},
                message:'',
            }
        },
        created(){
            this.fetchFeature();
        },
        methods:{
            fetchFeature(uri){
                uri = uri || '/api/admin/all-feature';
                this.axios.get(uri).then((response) => {
                  this.makePagination(response.data)
                  this.features = response.data.data;
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
                        let uri = `/api/admin/all-feature/${id}`;
                        this.axios.delete(uri).then((response) =>{
                            this.message = response.data;
                            this.$swal('Deleted', this.message.message, 'success')
                            this.fetchFeature();
                        });
                        
                    } 
                })
            },
        }
    }
</script>