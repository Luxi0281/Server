<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('city_name');
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::drop('city_translations');
    }
}
