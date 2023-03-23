<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id')->charset("utf8")->unsigned();
            $table->bigInteger('send_user_id')->charset("utf8")->unsigned(); 
            $table->string('body')->charset("utf8");

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('send_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('replys');
    }
}
