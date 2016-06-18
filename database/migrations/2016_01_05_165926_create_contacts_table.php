<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateContactsTable
 *
 * Contact's Database Migration
 */
class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            # Primary Key
            $table->increments('contact_id');

            # Attributes
            $table->string('contact_telephone', 500)->nullable();
            $table->string('contact_street', 500)->nullable();
            $table->string('contact_number', 500)->nullable();
            $table->string('contact_city')->nullable();
            $table->string('contact_postcode')->nullable();
            $table->string('contact_state')->nullable();
            $table->string('contact_country')->nullable();
            $table->integer('contact_hpid')->nullable();
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
        Schema::drop('contacts');
    }
}
