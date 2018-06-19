<template>
    <div class="card">
        <div class="header">
            <h2>NEW MARKETERS</h2>
        </div>
        <div class="body">
            <div class="row clearfix">
                <form ref="form" v-on:submit.prevent="updateSales()" enctype="multipart/form-data">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nik">No. KTP</label>
                            <input type="text" maxlength="20" id="kk" class="form-control" name="no_kk" v-model="sales.nik">
                        <div class="form-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kk">No. KK</label>
                        <div class="form-line">
                            <input type="text" maxlength="20" id="kk" class="form-control" name="no_kk" v-model="sales.no_kk">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="nama" v-model="sales.nama">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="tempat_lahir" v-model="sales.tempat_lahir">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date">Tanggal Lahir</label>
                        <div class="form-line">
                            <datepicker :input-class="'form-control'" :format="'yyyy-MM-dd'" :name="'tgl_lahir'" v-model="sales.tgl_lahir"></datepicker>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Gender </label>
                        <div class="form-inline">
                            <input type="radio" name="genre" id="pria" class="with-gap" value="Pria" v-model="sales.genre">
                            <label for="pria">Pria </label>

                            <input type="radio" name="genre" id="wanita" class="with-gap" value="Wanita" v-model="sales.genre">
                            <label for="wanita">Wanita</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >RT/RW</label>
                        <div class="form-line">
                            <input type="text" maxlength="50" class="form-control" name="rt_rw" v-model="sales.rt_rw">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Kelurahan/Desa</label>
                        <div class="form-line">
                            <input type="text" maxlength="50" class="form-control" name="kel_desa" v-model="sales.kel_desa">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Alamat</label>
                        <div class="form-line">
                            <textarea rows="2" class="form-control no-resize auto-growth" v-model="sales.alamat" name="alamat" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Tempat Tinggal</label>
                        <div class="form-line">
                            <textarea rows="2" class="form-control no-resize auto-growth" v-model="sales.alamat_tinggal" name="alamat_tinggal" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nik">Kecamatan</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="kecamatan" v-model="sales.kecamatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Kabupaten</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="kabupaten" v-model="sales.kabupaten">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Propinsi</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="propinsi" v-model="sales.propinsi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Negara</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="negara" v-model="sales.negara">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="nik">Pekerjaan</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="pekerjaan" v-model="sales.pekerjaan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">No. Hp</label>
                        <div class="form-line">
                            <input type="text" maxlength="15" class="form-control" name="phone" v-model="sales.phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">No. Hp Keluarga</label>
                        <div class="form-line">
                            <input type="text" maxlength="15" name="alt_phone" class="form-control" v-model="sales.alt_phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Agama</label>
                        <div class="form-inline">
                            <input type="radio" name="agama" id="hindu" class="with-gap"  value="HINDU" v-model="sales.agama">
                            <label for="hindu">Hindu </label>

                            <input type="radio" name="agama" id="islam" class="with-gap"  value="ISLAM" v-model="sales.agama">
                            <label for="islam">Islam</label>

                            <input type="radio" name="agama" id="katolik" class="with-gap"  value="KATOLIK" v-model="sales.agama">
                            <label for="katolik">Katolik</label>

                            <input type="radio" name="agama" id="protestan" class="with-gap" value="KRISTEN PROTESTAN" v-model="sales.agama">
                            <label for="protestan">Kristen Protestan</label>

                            <input type="radio" name="agama" id="budha" class="with-gap"   value="BUDHA" v-model="sales.agama">
                            <label for="budha">Budha</label>

                            <input type="radio" name="agama" id="budha" class="with-gap"   value="KONG HU CU" v-model="sales.agama">
                            <label for="budha">Kong Hu Cu</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Select Category</label>
                        <div class="form-line">
                            <select name="id_sales_category"  class="form-control" v-model="sales.id_sales_category">
                                <option>-select-</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.sales_category_name}}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="nik">Scan KTP</label>
                        <div class="form-line">
                            <input type="file" name="file_ktp" maxlength="15" class="form-control" @change="onFileChange" >
                        </div>
                    </div>
                    <div>
                        <img :src="file_ktp" class="img-responsive" height="36" >
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary waves-effect">
                    <i class="material-icons" >add_circle_outline</i> ADD NEW MARKETER
                    </button>
                    <router-link :to="{ name: 'ShowSales' }" class="btn btn-default waves-effect material-tooltip" title="Back to listing feature" >
                        BACK
                    </router-link>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
    export default{
        data(){
            return{
                sales : {},
                file_ktp : '',
                categories : [],
                
                
            }
        },
        created(){
            this.fetchCategory();
            this.getSales();
        },
        methods:{
            fetchCategory(){
                let uri = '/api/admin/sales-category';
                this.axios.get(uri).then((response) => {
                  this.categories = response.data.sales_category;
              });
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.file_ktp = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            getSales(){
                let uri = `/api/admin/data-sales/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.sales = response.data;
                });
            },

            updateSales(){
                let uri = '/api/admin/data-sales/'+this.$route.params.id;
               
                this.axios.patch(uri, this.sales).then((response) => {
                  this.$router.push({name: 'ShowSales'});
                });
            },

            
        },

        components:{
            'datepicker' : Datepicker
        }
        
    }
</script>