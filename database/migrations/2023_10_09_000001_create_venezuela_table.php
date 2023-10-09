<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function ($table) {
            $table->increments('id');
            $table->string('state');
            $table->string('iso_3166-2');
        });

        Schema::create('municipalities', function ($table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->string('municipality');
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::create('cities', function ($table) {
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->string('city');
            $table->tinyInteger('capital');
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::create('parishes', function ($table) {
            $table->increments('id');
            $table->integer('municipality_id')->unsigned();
            $table->string('parish');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('states');
        Schema::drop('municipalities');
        Schema::drop('cities');
        Schema::drop('parishes');
    }
};
