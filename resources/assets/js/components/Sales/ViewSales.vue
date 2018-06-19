<template>
    <div class="row clearfix">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">flag</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL LISTING</div>
                        <div class="number">{{commition}}</div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-light-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">SALARY</div>
                        <div class="number">Rp.{{sales.sales_category.salary.toLocaleString('en-US')}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">add_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">COMMITION</div>
                        <div class="number">{{sales.sales_category.commition}} %</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-indigo hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">check_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">FULL COMMITION</div>
                        <div class="number">Rp.{{(commition * (sales.sales_category.salary * sales.sales_category.commition / 100)).toLocaleString('en-US') }} </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>{{sales.nama}}'s Profile</h2>
                </div>
                <div class="body">
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <td>No. KTP</td>
                                <td>:</td>
                                <td>{{sales.nik}}</td>
                            </tr>
                            <tr>
                                <td>No. KK</td>
                                <td>:</td>
                                <td>{{sales.no_kk}}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{sales.nama}}</td>
                            </tr>
                            <tr>
                                <td>Tempat/Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{sales.tempat_lahir}}, {{sales.tgl_lahir}}</td>
                            </tr>
                            <tr>
                                <td>RT/RW</td>
                                <td>:</td>
                                <td>{{sales.rt_rw}}</td>
                            </tr>
                            <tr>
                                <td>Kelurahan/Desa</td>
                                <td>:</td>
                                <td>{{sales.kel_desa}}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{sales.kecamatan}}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten / Kota</td>
                                <td>:</td>
                                <td>{{sales.kabupaten}}</td>
                            </tr>
                            <tr>
                                <td>Propinsi</td>
                                <td>:</td>
                                <td>{{sales.propinsi}}</td>
                            </tr>
                            <tr>
                                <td>Negara</td>
                                <td>:</td>
                                <td>{{sales.negara}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{sales.alamat_tinggal}}</td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td>{{sales.phone}}</td>
                            </tr>
                            <tr>
                                <td>Hp Keluarga</td>
                                <td>:</td>
                                <td>{{sales.alt_phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h2>{{sales.nama}}'s Marketing Log</h2>
                </div>
                <div class="body">

                </div>
            </div>
        </div>
        </div>
    </div>
    
</template>
<script>
    export default{
        data(){
            return{
                commition :4,
                sales :{}
            }
        },
        created(){
            this.fetchSales();
        },
        methods:{
            fetchSales(uri){
                uri = '/api/admin/data-sales/'+this.$route.params.id;
                this.axios.get(uri).then((response) => {
                  this.sales = response.data;
                });
            },
        }
    }
</script>