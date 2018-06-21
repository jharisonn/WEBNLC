<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('history', function (Blueprint $table) {
          $table->increments('id_history');
          $table->integer('id_team');
          $table->integer('id_soal');
          $table->foreign('id_team')->references('id_team')->on('team');
          $table->foreign('id_soal')->references('id_soal')->on('soal');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
