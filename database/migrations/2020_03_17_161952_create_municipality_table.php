<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cod_muni');
            $table->string('name_municipality');
            $table->unsignedBigInteger('cod_prov');
            $table->unsignedBigInteger('cod_red');
            $table->foreign('cod_prov')->references('cod_prov')->on('provincie');
            $table->unsignedBigInteger('id_province');
            $table->foreign('id_province')->references('id')->on('province');
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
        Schema::dropIfExists('municipalities');
    }
}
