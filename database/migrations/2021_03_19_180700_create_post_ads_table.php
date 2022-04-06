<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_ads', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('post_type')->default('0');
            $table->string('popular_ads')->default('0')->nullable();
            $table->string('top_search')->default('0')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->TEXT('description')->nullable();
            $table->TEXT('address')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('price_condition')->nullable();
            $table->string('item_condition')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('0');
            $table->string('admin_status')->default('0');
            $table->integer('view_count')->default('0');
            $table->string('package_status')->default('0');
            $table->string('used_package_id')->default('0');
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
        Schema::dropIfExists('post_ads');
    }
}
