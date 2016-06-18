<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePatientmedicalsTable
 * 
 * Patients' Medical Alerts Database Migration
 */
class CreatePatientmedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_alerts', function (Blueprint $table) {
            # Primary Key
            $table->increments('id');
            
            # Attributes
            $table->integer('patient_id')->unsigned();
            $table->integer('medicalalert_id')->unsigned();
            $table->timestamps();

            # Foreign Keys
            $table->foreign('patient_id')
                ->references('patient_id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('medicalalert_id')
                ->references('medicalalert_id')->on('medical_alerts')
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
        Schema::table('patient_medical_alerts', function($table)
        {
            $table->dropForeign('patient_medical_alerts_medicalalert_id_foreign');
            $table->dropForeign('patient_medical_alerts_patient_id_foreign');
            $table->dropColumn('medicalalert_id');
            $table->dropColumn('patient_id');
        });
        Schema::drop('patient_medical_alerts');
    }
}
