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
            $table->increments('id_listing');
            $table->integer('id_listing_category');
            $table->integer('id_sales');
            $table->integer('id_merchant');
            $table->string('listing_slug');
            $table->string('listing_title');
            $table->string('listing_tagline');
            $table->string('city',50);
            $table->text('full_address');
            $table->string('phone',15);
            $table->string('website');
            $table->char('accept_booking',1);
            $table->char('accept_payment',1);
            $table->string('good_for',300);
            $table->string('price_range');
            $table->float('price_from',10,2);
            $table->float('price_to',10,2);
            $table->float('best_price',10,2);
            $table->text('listing_description');
            $table->string('facebook_link',350);
            $table->string('instagram_link',350);
            $table->string('linked_in_link',350);
            $table->string('google_plus_link',350);
            $table->string('youtube_link',350);
            $table->string('tags',350);
            $table->string('video_url',350);
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
