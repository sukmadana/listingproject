<template>
    <div class="card">
        <div class="header">
            <h2>Sales Marketer List </h2>
            <div class="header-dropdown m-r--5">
                <router-link :to="{ name: 'CreateSales' }" class="waves-effect btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="ADD NEW FEATURE" >
                    <i class="material-icons white">add_circle_outline</i> Add Data
                </router-link>                
            </div>
        </div>
        
        <div class="body">
            <div class="table-responsive">
                <table class=" table table-striped">
                    <thead>
                        <tr>
                           <th>#</th> 
                           <th>ID SALES</th>
                           <th>SALES NAME</th>
                           <th>PHONE</th>
                           <th>ADDRESS</th>
                           <th>CATEGORY</th>
                           <th>FILE</th>
                           <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sale in sales" :key="sale.id">
                            <td>{{no++}}</td>
                            <td>{{sale.id_sales}}</td>
                            <td>{{sale.nama}}</td>
                            <td>{{sale.phone}}</td>
                            <td>{{sale.alamat}}</td>
                            <td>{{sale.sales_category.sales_category_name}}</td>
                            <td><a :href="'/uploads/sales/'+sale.file_ktp" target="_blank"><img :src="'/uploads/sales/'+sale.file_ktp" width="50px"></a></td>
                            <td>
                                <router-link :to="{name: 'ViewSales', params: { id: sale.id }}" class="btn btn-default"><i class="material-icons" title="View Data">visibility</i></router-link>
                                <router-link :to="{name: 'EditSales', params: { id: sale.id }}" class="btn btn-primary"><i class="material-icons" title="Edit Data">create</i></router-link> 
                                <button class="btn btn-danger waves-effect " v-on:click="confirmDelete(sale.id)" ><i class="material-icons" title="Delete Data">delete</i></button>
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
                no :1,
                sales : [],
                pagination : {},
                message : '',
            }
        },
        created(){
            this.fetchSales();
        },
        methods:{
            fetchSales(uri){
                uri = uri || 'http://localhost/listingproject/public/api/admin/data-sales';
                this.axios.get(uri).then((response) => {
                  this.makePagination(response.data)
                  this.sales = response.data.data;
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
                        let uri = `/api/admin/data-sales/${id}`;
                        this.axios.delete(uri).then((response) =>{
                            this.message = response.data;
                            this.$swal('Deleted', this.message.message, 'success')
                            this.fetchSales();
                        });
                        
                    } 
                })
            },
        }

    }
</script>