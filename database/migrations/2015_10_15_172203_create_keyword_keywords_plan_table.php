<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordKeywordsPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_keywords_plan', function (Blueprint $table) {
            $table->integer('keyword_id')->unsigned();
            $table->integer('keywords_plan_id')->unsigned();

            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
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
        Schema::drop('keyword_keywords_plan');
    }
}
