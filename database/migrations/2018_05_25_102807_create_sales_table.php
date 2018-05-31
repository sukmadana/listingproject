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
            $table->unsignedInteger('id_sales_category');
            $table->string('id_sales',20)->unique();
            $table->string('nik',20)->unique();
            $table->string('no_kk',20);
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('genre',20);
            $table->string('alamat',400);
            $table->string('alamat_tinggal',500);
            $table->string('rt_rw',50);
            $table->string('kel_desa',50);
            $table->string('kecamatan',100);
            $table->string('kabupaten',100);
            $table->string('propinsi',100);
            $table->string('negara',100);
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('phone',15);
            $table->string('alt_phone',15)->nullable();
            $table->string('file_ktp',500);
            $table->string('status',20);
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
