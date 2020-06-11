<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstableSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estable_saluds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_estable_salud');
            $table->string('name_estable_salud');
            $table->integer('subsector');
            $table->foreign('subsector')->references('id')->on('subsectores');
            $table->integer('atention_nivel');
            $table->foreign('atention_nivel')->references('id')->on('level_atention');
            $table->string('type');
            $table->integer('cod_muni');
            $table->unsignedBigInteger('id_muni');
            $table->foreign('id_muni')->references('id')->on('municipalities');
            $table->unsignedBigInteger('user_create');
            $table->foreign('user_create')->references('id')->on('users');
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
        Schema::dropIfExists('estable_saluds');
    }
}
