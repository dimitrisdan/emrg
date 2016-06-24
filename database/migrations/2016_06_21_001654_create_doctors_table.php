<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            # Primary Key
            $table->increments('doctor_id');

            # Attributes
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('profession',255);
            $table->timestamps();

            # Foreign Keys
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->ondelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}
