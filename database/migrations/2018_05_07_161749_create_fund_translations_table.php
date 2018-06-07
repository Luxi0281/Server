<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFundTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fund_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
            $table->foreign('fund_id')->references('id')->on('funds');
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
        Schema::drop('fund_translations');
    }
}
