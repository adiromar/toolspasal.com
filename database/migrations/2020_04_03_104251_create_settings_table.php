<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('siteName');
            $table->string('siteLogo');
            $table->text('aboutUs')->nullable();
            $table->text('privacyPolicy');
            $table->string('copyrightText', 255)->default('CopyRight © 2020');
            $table->text('socialLinks');
            $table->string('contacts', 255);

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
        Schema::dropIfExists('site_settings');
    }
}
