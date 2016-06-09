<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert(
            array(
                'name' => 'Mitsos',
                'email' => 'md@hgmail.com',
                'password' => bcrypt('malamatina86'),
            )
        );
        
        DB::table('users')->insert(
            array(
                'name' => 'Olga Triantou',
                'email' => 'ot@hotmail.com',
                'password' => bcrypt('malamatina86'),
            )
        );
        DB::table('users')->insert(
            array(
                'name' => 'Tina Mpitouni',
                'email' => 'tm@hotmail.com',
                'password' => bcrypt('malamatina86'),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
