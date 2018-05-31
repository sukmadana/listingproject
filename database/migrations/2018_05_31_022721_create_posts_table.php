<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_post_category')->nullable();
            $table->string('post_slug',225);
            $table->string('post_title');
            $table->text('body');
            $table->string('post_img',350)->nullable();
            $table->string('meta_title',160)->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description',160)->nullable();
            $table->string('post_status',20);
            $table->unsignedInteger('id_admin')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
