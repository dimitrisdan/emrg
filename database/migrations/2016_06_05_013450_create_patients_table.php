<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;




class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('patient_id');
            $table->integer('contact_id')->unsigned();
            $table->integer('guardian_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('patientNationalId')->nullable();
            $table->string('patientFirstName')->nullable();
            $table->string('patientSurName')->nullable();
            $table->string('patientDob')->nullable();
            $table->string('patientGender')->nullable();
            $table->string('patientInsuranceNumber')->nullable();
            $table->timestamps();
            # Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guardian_id')->references('guardian_id')->on('guardians');
            $table->foreign('contact_id')->references('contact_id')->on('contacts');
        });

        DB::table('patients')->insert(
            array(
                'patient_id' => 1,
                'contact_id' => 1,
                'guardian_id' => 1,
                'user_id' => 1,
                'patientNationalId' => rand(100000000000,999999999999),
                'patientFirstName' => 'Dimitris',
                'patientSurName' => 'Danampasis',
                'patientDob' => '02/04/1986',
                'patientGender' => 'Male',
                'patientInsuranceNumber' => 'AB666666'
            )
        );
        DB::table('patients')->insert(
            array(
                'patient_id' => 2,
                'contact_id' => 2,
                'guardian_id' => 2,
                'user_id' => 2,
                'patientNationalId' => rand(100000000000,999999999999),
                'patientFirstName' => 'Olga',
                'patientSurName' => 'Triantou',
                'patientDob' => '02/04/1956',
                'patientGender' => 'Female',
                'patientInsuranceNumber' => 'AB555555'
            )
        );
        DB::table('patients')->insert(
            array(
                'patient_id' => 3,
                'contact_id' => 3 ,
                'guardian_id' => 3,
                'user_id' => 3,
                'patientNationalId' => rand(100000000000,999999999999),
                'patientFirstName' => 'Tina',
                'patientSurName' => 'Mpitouni',
                'patientDob' => '02/04/1986',
                'patientGender' => 'Female',
                'patientInsuranceNumber' => 'AB222222'
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
        Schema::drop('patients');
    }
}
