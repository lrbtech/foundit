<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
            $table->string('post_id')->nullable();
            $table->TEXT('feedback')->nullable();
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
        Schema::dropIfExists('post_feedbacks');
    }
}
