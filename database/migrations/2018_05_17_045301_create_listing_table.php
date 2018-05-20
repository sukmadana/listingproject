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
            $table->char('accept_booking',1)->nullable();
            $table->char('accept_payment',1)->nullable();
            $table->string('good_for',300)->nullable();
            $table->string('price_range');
            $table->float('price_from',10,2);
            $table->float('price_to',10,2);
            $table->float('best_price',10,2)->nullable();
            $table->text('listing_description')->nullable();
            $table->string('facebook_link',350)->nullable();
            $table->string('instagram_link',350)->nullable();
            $table->string('linked_in_link',350)->nullable();
            $table->string('google_plus_link',350)->nullable();
            $table->string('youtube_link',350)->nullable();
            $table->string('tags',350)->nullable();
            $table->string('video_url',350)->nullable();
            $table->string('image_feature',350);
            $table->char('allow_gallery',1);
            $table->string('listing_status',20);
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
