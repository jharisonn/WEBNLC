<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team', function (Blueprint $table) {
          $table->increments('id_team');
          $table->string('name_team',255);
          $table->integer('score')->default('0');
          $table->integer('id_group')->nullable();
      });
      DB::table('team')->insert([
        ['name_team' => 'noob', 'id_group' => '1'],
        ['name_team' => 'noob1', 'id_group' => '2'],
        ['name_team' => 'noob2', 'id_group' => '3'],
        ['name_team' => 'noob3', 'id_group' => '4'],
        ['name_team' => 'noob4', 'id_group' => '1'],
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}
