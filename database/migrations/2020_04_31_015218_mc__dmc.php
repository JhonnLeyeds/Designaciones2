<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class McDmc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_dmc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_medical_center');
            $table->foreign('id_medical_center')->references('id')->on('estable_saluds');
            $table->unsignedBigInteger('id_date_medical_center');
            $table->foreign('id_date_medical_center')->references('id')->on('date_medical_center');
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
        Schema::dropIfExists('mc_dmc');
    }
}
