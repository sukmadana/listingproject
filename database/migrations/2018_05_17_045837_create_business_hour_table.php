<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessHourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_listing')->nullable();
            $table->string('day',20);
            $table->string('time_from',10);
            $table->string('time_to',10);
            $table->char('full_day',1)->nullable();
            $table->timestamps();
        });

        Schema::table('business_hour', function (Blueprint $table) {
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
        Schema::dropIfExists('bussiness_hours');
    }
}
