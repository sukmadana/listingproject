<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_galleries', function (Blueprint $table) {
            $table->increments('id_listing_gallery');
            $table->integer('id_listing');
            $table->string('name');
            $table->text('foto_description');
            $table->string('img_name',400);
            $table->string('img_alt',400);
            $table->string('img_url',500);
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
        Schema::dropIfExists('listing_galleries');
    }
}
