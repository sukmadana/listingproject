<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_listing_category')->nullable();
            $table->string('features_name',50);
            $table->string('features_icon',80)->nullable();
            $table->timestamps();
        });

        Schema::table('features', function (Blueprint $table) {
            $table->foreign('id_listing_category')->references('id')->on('listing_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
