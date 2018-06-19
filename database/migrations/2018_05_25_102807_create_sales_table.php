<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sales_category')->nullable();
            $table->string('id_sales',20)->nullable();
            $table->string('nik',20)->nullable();
            $table->string('no_kk',20)->nullable();
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('gender',20)->nullable();
            $table->string('alamat',400)->nullable();
            $table->string('alamat_tinggal',500)->nullable();
            $table->string('rt_rw',50)->nullable();
            $table->string('kel_desa',50)->nullable();
            $table->string('kecamatan',100)->nullable();
            $table->string('kabupaten',100)->nullable();
            $table->string('propinsi',100)->nullable();
            $table->string('negara',100)->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('alt_phone',15)->nullable();
            $table->string('file',500)->nullable();
            $table->char('status',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
