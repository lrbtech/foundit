<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_ads', function (Blueprint $table) {
            $table->id();
            $table->text('adsense_script')->nullable();
            $table->text('adsense_728_90_script')->nullable();
            $table->text('adsense_160_600_script')->nullable();
            $table->text('adsense_300_250_script')->nullable();
            $table->text('adsense_300_600_script')->nullable();
            $table->string('image_728_90')->nullable();
            $table->string('image_160_600')->nullable();
            $table->string('image_300_250')->nullable();
            $table->string('image_300_600')->nullable();
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
        Schema::dropIfExists('google_ads');
    }
}
