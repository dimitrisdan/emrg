<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * Class CreatePatientallergiesTable
 * 
 * Patients' Allergies Database Migration
 */
class CreatePatientallergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_allergy_alerts', function (Blueprint $table) {
            # Primary Key
            $table->increments('id');
            
            # Attributes
            $table->integer('patient_id')->unsigned();
            $table->integer('allergy_id')->unsigned();
            $table->timestamps();
            
            # Foreign Keys
            $table->foreign('patient_id')
                ->references('patient_id')->on('patients')
                ->onDelete('cascade');
            
            $table->foreign('allergy_id')
                ->references('allergy_id')->on('allergys')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_allergy_alerts', function($table)
        {
            $table->dropForeign('patient_allergy_alerts_allergy_id_foreign');
            $table->dropForeign('patient_allergy_alerts_patient_id_foreign');
            $table->dropColumn('allergy_id');
            $table->dropColumn('patient_id');
        });
        Schema::drop('patient_allergy_alerts');
    }
}
