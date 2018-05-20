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
            $table->increments('id');
            $table->unsignedInteger('id_listing')->nullable();
            $table->string('name')->nullable();
            $table->text('foto_description')->nullable();
            $table->string('img_name',400);
            $table->string('img_alt',400)->nullable();
            $table->string('img_url',500);
            $table->timestamps();
        });

        Schema::table('listing_galleries', function (Blueprint $table) {
            $table->foreign('id_listing')->references('id')->on('listings')->onDelete('cascade');
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
