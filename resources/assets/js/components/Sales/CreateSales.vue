<template>
    <div class="card">
        <div class="header">
            <h2>NEW MARKETERS</h2>
        </div>
        <div class="body">
            <div class="row clearfix">
                <form ref="form" v-on:submit.prevent="addSales()" enctype="multipart/form-data">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nik">No. KTP</label>
                        <div class="form-line">
                            <input type="text" maxlength="20" id="nik" class="form-control" name="nik">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kk">No. KK</label>
                        <div class="form-line">
                            <input type="text" maxlength="20" id="kk" class="form-control" name="no_kk">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="nama">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="tempat_lahir">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date">Tanggal Lahir</label>
                        <div class="form-line">
                            <datepicker :input-class="'form-control'" :format="'yyyy-MM-dd'" :name="'tgl_lahir'"></datepicker>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Gender </label>
                        <div class="form-inline">
                            <input type="radio" name="genre" id="pria" class="with-gap" value="Pria">
                            <label for="pria">Pria </label>

                            <input type="radio" name="genre" id="wanita" class="with-gap" value="Wanita">
                            <label for="wanita">Wanita</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >RT/RW</label>
                        <div class="form-line">
                            <input type="text" maxlength="50" class="form-control" name="rt_rw">
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Kelurahan/Desa</label>
                        <div class="form-line">
                            <input type="text" maxlength="50" class="form-control" name="kel_desa">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Alamat</label>
                        <div class="form-line">
                            <textarea rows="2" class="form-control no-resize auto-growth" name="alamat" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Tempat Tinggal</label>
                        <div class="form-line">
                            <textarea rows="2" class="form-control no-resize auto-growth" name="alamat_tinggal" style="overflow: hidden; word-wrap: break-word; height: 32px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="nik">Kecamatan</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="kecamatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Kabupaten</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="kabupaten">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Propinsi</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="propinsi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">Negara</label>
                        <div class="form-line">
                            <input type="text" maxlength="100" class="form-control" name="negara">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="nik">Pekerjaan</label>
                        <div class="form-line">
                            <input type="text" maxlength="190" class="form-control" name="pekerjaan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">No. Hp</label>
                        <div class="form-line">
                            <input type="text" maxlength="15" class="form-control" name="phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nik">No. Hp Keluarga</label>
                        <div class="form-line">
                            <input type="text" maxlength="15" name="alt_phone" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Agama</label>
                        <div class="form-inline">
                            <input type="radio" name="agama" id="hindu" class="with-gap"  value="HINDU">
                            <label for="hindu">Hindu </label>

                            <input type="radio" name="agama" id="islam" class="with-gap"  value="ISLAM">
                            <label for="islam">Islam</label>

                            <input type="radio" name="agama" id="katolik" class="with-gap"  value="KATOLIK">
                            <label for="katolik">Katolik</label>

                            <input type="radio" name="agama" id="protestan" class="with-gap" value="KRISTEN PROTESTAN">
                            <label for="protestan">Kristen Protestan</label>

                            <input type="radio" name="agama" id="budha" class="with-gap"   value="BUDHA">
                            <label for="budha">Budha</label>

                            <input type="radio" name="agama" id="budha" class="with-gap"   value="KONG HU CU">
                            <label for="budha">Kong Hu Cu</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nik">Select Category</label>
                        <div class="form-line">
                            <select name="id_sales_category"  class="form-control" >
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

            addSales(){
                let uri = '/api/admin/data-sales';
                var vm = this
                var formdata = new FormData(vm.$refs.form);
                this.axios.post(uri, formdata).then((response) => {
                    console.log(response)
                    this.$router.push({name: 'ShowSales'})
                })
            }
        },

        components:{
            'datepicker' : Datepicker
        }
        
    }
</script>