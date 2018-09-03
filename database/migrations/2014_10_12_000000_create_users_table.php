<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
        });
        DB::table('users')->insert([
          ['username' => 'A01', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'A02', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'A03', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'A04', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'B01', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'B02', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'B03', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'B04', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'C01', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'C02', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'C03', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'C04', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'D01', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'D02', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'D03', 'password' => bcrypt('nlcsukses2018')],
          ['username' => 'D04', 'password' => bcrypt('nlcsukses2018')],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
