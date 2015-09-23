<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->unique();
            $table->text('cities');
            $table->text('keywords');
            $table->boolean('approved');
            $table->integer('company_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keywords_plans');
    }
}
