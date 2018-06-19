<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_listing_category')->nullable();
            $table->unsignedInteger('id_sales')->nullable();
            $table->unsignedInteger('id_merchant')->nullable();
            $table->string('listing_slug');
            $table->string('listing_title');
            $table->string('listing_tagline');
            $table->string('city',50);
            $table->text('full_address');
            $table->string('phone',15)->nullable();
            $table->string('website')->nullable();
            $table->string('good_for',300)->nullable();
            $table->float('price',10,2)->nullable();
            $table->text('listing_description')->nullable();
            $table->text('social')->nullable();
            $table->string('video_url',350)->nullable();
            $table->string('image_feature',350);
            $table->char('allow_gallery',1);
            $table->string('listing_status',20);
            $table->float('lat',10,6);
            $table->float('lng',10,6);
            $table->text('feature');
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
        Schema::dropIfExists('listings');
    }
}
