<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGuardiansTable
 * 
 * Guardian's Database Migration
 */
class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            # Primary Key
            $table->increments('guardian_id');
            
            # Attributes
            $table->string('guardian_role')->nullable();
            $table->string('guardian_firstname', 500)->nullable();
            $table->string('guardian_lastname', 500)->nullable();
            $table->string('guardian_telephone')->nullable();
            $table->string('guardian_email', 500)->nullable();
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
        Schema::drop('guardians');
    }
}
