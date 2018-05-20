<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_visa_category')->nullable();
            $table->unsignedInteger('id_visa_type')->nullable();
            $table->string('full_name');
            $table->text('bali_address');
            $table->string('phone',15);
            $table->string('email');
            $table->text('address_from')->nullable();
            $table->text('emergency_cp')->nullable();
            $table->dateTime('travel_date')->nullable();
            $table->string('apply_state',300)->nullable();
            $table->text('purpose_to_visit')->nullable();
            $table->char('true_data',1)->nullable();
            $table->string('whatsapp_no',15)->nullable();
            $table->dateTime('leave_date')->nullable();
            $table->string('passport_file_name',500)->nullable();
            $table->string('bank_statement_file_name',500)->nullable();
            $table->string('visa_status',20);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('visas', function (Blueprint $table) {
            $table->foreign('id_visa_category')->references('id')->on('visa_category')->onDelete('cascade');
        });

        Schema::table('visas', function (Blueprint $table) {
            $table->foreign('id_visa_type')->references('id')->on('visa_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visas');
    }
}
