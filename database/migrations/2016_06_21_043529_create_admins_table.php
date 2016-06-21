<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            # Primary Key
            $table->increments('admin_id');

            # Attributes
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::drop('admins');
    }
}
