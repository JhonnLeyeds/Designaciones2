<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('ap_pat');
            $table->string('ap_mat');
            $table->string('ci');
            $table->string('exp');
            $table->date('date');
            $table->string('celular');
            $table->string('correo');
            $table->string('sexo');
            $table->unsignedBigInteger('depart_id');
            $table->unsignedBigInteger('univ_id');
            $table->unsignedBigInteger('insti_id');
            $table->unsignedBigInteger('carrer_id');
            $table->unsignedBigInteger('caso_esp');
            $table->foreign('depart_id')->references('id')->on('departamentos');
            $table->foreign('univ_id')->references('id')->on('univeridads');
            $table->foreign('insti_id')->references('id')->on('institutos');
            $table->foreign('carrer_id')->references('id')->on('carrer');
            $table->foreign('caso_esp')->references('id')->on('casos');
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
        Schema::dropIfExists('student');
    }
}
