<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFundsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->string('link');
            $table->string('email')->unique();
            $table->string('phone');
            $table->integer('location_id')->unsigned()->unique();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('funds');
    }
}
