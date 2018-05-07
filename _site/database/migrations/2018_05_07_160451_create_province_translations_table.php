<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvinceTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('province_name');
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces');
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
        Schema::drop('province_translations');
    }
}
