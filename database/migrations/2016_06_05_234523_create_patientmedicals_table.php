<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientmedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patientToMedicalAlerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('medical_alertid')->unsigned();
            $table->timestamps();
            # Foreign Keys
            $table->foreign('patient_id')->references('patient_id')->on('patients');
            $table->foreign('medical_alertid')->references('medical_alertid')->on('medicalAlerts');
        });

//        DB::table('patientToMedicalAlerts')->insert(
//            array(
//                'patient_id' => 1,
//                'medical_alertid' => 1,
//            )
//        );
//        DB::table('patientToMedicalAlerts')->insert(
//            array(
//                'patient_id' => 2,
//                'medical_alertid' => 2,
//            )
//        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patientToMedicalAlerts');
    }
}
