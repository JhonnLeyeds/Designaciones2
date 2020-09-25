<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers_institute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_career');
            $table->unsignedBigInteger('institute_id');
            // $table->unsignedBigInteger('insti_id');
            $table->foreign('institute_id')->references('id')->on('institutes');
            // $table->foreign('insti_id')->references('id')->on('institutos');
            $table->unsignedBigInteger('type_internation');
            $table->foreign('type_internation')->references('id')->on('internation_types');
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
        Schema::dropIfExists('careers_institute');
    }
}
