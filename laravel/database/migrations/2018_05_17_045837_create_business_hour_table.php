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
        Schema::create('bussiness_hours', function (Blueprint $table) {
            $table->increments('id_business_hour');
            $table->integer('id_listing');
            $table->string('day',20);
            $table->string('time_from',10);
            $table->string('time_to',10);
            $table->char('full_day',1);
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
        Schema::dropIfExists('bussiness_hours');
    }
}
