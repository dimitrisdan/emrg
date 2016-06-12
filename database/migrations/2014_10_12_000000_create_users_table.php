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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert(
            array(
                'first_name' => 'Mitsos',
                'last_name' => 'Danampasis',
                'email' => 'md@hgmail.com',
                'password' => bcrypt('malamatina86'),
            )
        );
        
        DB::table('users')->insert(
            array(
                'first_name' => 'Olga',
                'last_name' => 'Triantou',
                'email' => 'ot@hotmail.com',
                'password' => bcrypt('malamatina86'),
            )
        );
        DB::table('users')->insert(
            array(
                'first_name' => 'Tina',
                'last_name' => 'Mpitouni',
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
