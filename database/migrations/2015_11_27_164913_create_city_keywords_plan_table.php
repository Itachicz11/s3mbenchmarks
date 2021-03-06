<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityKeywordsPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_keywords_plan', function(Blueprint $table) {
            $table->integer('city_id')->unsigned();
            $table->integer('keywords_plan_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('keywords_plan_id')->references('id')->on('keywords_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('city_keywords_plan');
    }
}
