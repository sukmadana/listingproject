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
            $table->increments('id_visa');
            $table->unsignedInteger('id_visa_category');
            $table->unsignedInteger('id_visa_type');
            $table->string('full_name');
            $table->text('bali_address');
            $table->string('phone',15);
            $table->string('email');
            $table->text('address_from');
            $table->text('emergency_cp');
            $table->dateTime('travel_date');
            $table->string('apply_state',300);
            $table->text('purpose_to_visit');
            $table->char('true_data',1);
            $table->string('whatsapp_no',15);
            $table->dateTime('leave_date');
            $table->string('passport_file_name',500);
            $table->string('bank_statement_file_name',500);
            $table->string('visa_status',20);
            $table->softDeletes();
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
        Schema::dropIfExists('visas');
    }
}
