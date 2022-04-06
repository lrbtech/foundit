<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('post_id')->nullable();
            $table->string('channel_name')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('to_id')->nullable();
            $table->TEXT('msg')->nullable();
            $table->string('image')->nullable();
            $table->string('chat_type')->default('0');
            $table->string('file_extension')->nullable();
            $table->string('file_name')->nullable();
            $table->string('upload_files')->nullable();
            $table->string('read_status')->default('0');
            $table->string('status')->default('0');
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
        Schema::dropIfExists('chats');
    }
}
