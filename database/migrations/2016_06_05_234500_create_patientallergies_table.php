<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientallergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patientToAllergyAlerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('allergy_id')->unsigned();
            $table->timestamps();
            # Foreign Keys
            $table->foreign('patient_id')->references('patient_id')->on('patients');
            $table->foreign('allergy_id')->references('allergy_id')->on('allergys');
        });

        DB::table('patientToAllergyAlerts')->insert(
            array(
                'patient_id' => 1,
                'allergy_id' => 1,
            )
        );

        DB::table('patientToAllergyAlerts')->insert(
            array(
                'patient_id' => 2,
                'allergy_id' => 2,
            )
        );
        DB::table('patientToAllergyAlerts')->insert(
            array(
                'patient_id' => 3,
                'allergy_id' => 3,
            )
        );
        DB::table('patientToAllergyAlerts')->insert(
            array(
                'patient_id' => 3,
                'allergy_id' => 2,
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
        Schema::drop('patientToAllergyAlerts');
    }
}
