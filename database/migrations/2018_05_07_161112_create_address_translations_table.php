<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('full_address');
            $table->timestamps();
            $table->foreign('address_id')->references('id')->on('addresses');
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
        Schema::drop('address_translations');
    }
}
