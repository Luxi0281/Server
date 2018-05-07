<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountryTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('country_name');
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('country_translations');
    }
}
