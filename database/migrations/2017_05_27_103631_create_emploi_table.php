<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('emplois', function(Blueprint $table){
             $table->increments('id');
             $table->string('JOBURL', 250)->nullable();
             $table->string('SALARYMAX', 40)->nullable();
             $table->string('SALARYMIN', 40)->nullable();
             $table->string('SALARYTYPE', 20)->nullable();
             $table->string('NAME', 40)->nullable();
             $table->string('language', 4)->default('EN')->nullable();
             $table->string('POSITION', 150)->nullable();
             $table->string('JOBREF', 30)->nullable();
             $table->longText('JOB_SUMMARY')->nullable();
             $table->boolean('tweeted')->nullable();
             $table->dateTimeTz('POSTDATE')->nullable();
             $table->dateTimeTz('EXPIRYDATE')->nullable();
             $table->string('slug', 200)->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('emplois');

    }
}
