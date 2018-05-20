<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingFeatureRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_features')->nullable();
            $table->unsignedInteger('id_listing')->nullable();
            $table->char('active',1);
            $table->timestamps();
        });

        Schema::table('listing_features', function (Blueprint $table) {
            $table->foreign('id_features')->references('id')->on('features')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('listing_features', function (Blueprint $table) {
            $table->foreign('id_listing')->references('id')->on('listings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_features');
    }
}
