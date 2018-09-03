<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('group', function (Blueprint $table) {
          $table->increments('id_group');
          $table->char('name_group',1);
      });
      DB::table('group')->insert([
        ['name_group' => 'A'],
        ['name_group' => 'B'],
        ['name_group' => 'C'],
        ['name_group' => 'D'],
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group');
    }
}
