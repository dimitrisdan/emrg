<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMedicalalertsTable
 * 
 * Medical Alerts' Database Migration
 */
class CreateMedicalalertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_alerts', function (Blueprint $table) {
            # Primary Key
            $table->increments('medicalalert_id');
            
            # Attributes
            $table->string('medicalalert_description');
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
        Schema::drop('medical_alerts');
    }
}
