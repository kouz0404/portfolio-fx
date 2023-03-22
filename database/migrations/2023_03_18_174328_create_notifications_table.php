<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('send_user_id')->unsigned(); 
            $table->unsignedInteger('got_user_id'); 
            $table->bigInteger('reply_id')->unsigned()->nullable();
            $table->string('message');
            $table->string('send_user_name')->nullable();
            $table->timestamps();

            $table->foreign('send_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('replys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
