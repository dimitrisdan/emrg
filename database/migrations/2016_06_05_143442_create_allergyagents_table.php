<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAllergyagentsTable
 * 
 * Allergy Agent Database Migration
 */
class CreateAllergyagentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergy_agents', function (Blueprint $table) {
            # Primary Key
            $table->increments('allergy_agent_id');
            
            # Attributes
            $table->string('allergy_agent_description');
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
        Schema::drop('allergy_agents');
    }
}
