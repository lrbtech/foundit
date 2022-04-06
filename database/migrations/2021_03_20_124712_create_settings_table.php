<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('about_us')->nullable();
            $table->text('footer_description')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('how_it_works')->nullable();
            $table->text('ourstory')->nullable();
            $table->text('careers')->nullable();
            $table->text('autodealerships')->nullable();
            $table->text('trustsaftey')->nullable();
            $table->text('community')->nullable();
            $table->text('press')->nullable();
            $table->text('help')->nullable();
            $table->string('sms_api_key')->nullable();
            $table->string('sms_senderid')->nullable();
            $table->string('mobile')->nullable();
            $table->string('landline')->nullable();
            $table->string('email')->nullable();
            $table->string('other_email')->nullable();
            $table->string('admin_email')->nullable();
            $table->text('iframe_map')->nullable();
            $table->text('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('header_banner')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('metatag_title')->nullable();
            $table->TEXT('metatag_description')->nullable();
            $table->TEXT('metatag_keywords')->nullable();
            $table->TEXT('google_ads')->nullable();
            $table->TEXT('google_ads_banner')->nullable();
            $table->TEXT('google_ads_square')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
