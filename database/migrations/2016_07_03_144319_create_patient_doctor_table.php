<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();

            $table->foreign('patient_id')->references('patient_id')->on('patients')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctors')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['patient_id', 'doctor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_doctor');
    }
}
