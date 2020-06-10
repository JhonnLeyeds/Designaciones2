<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniveridadsTable extends Migration
{
    /**
     * Run the migratiosns.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('univeridads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_university');
            $table->unsignedBigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
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
        Schema::dropIfExists('univeridads');
    }
}
