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
            $table->string('patient_nationalid')->nullable();
            $table->string('patient_firstname')->nullable();
            $table->string('patient_lastname')->nullable();
            $table->string('patient_dob')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_insurance')->nullable();
            $table->timestamps();
            # Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guardian_id')->references('guardian_id')->on('guardians');
            $table->foreign('contact_id')->references('contact_id')->on('contacts');
        });

//        DB::table('patients')->insert(
//            array(
//                'contact_id' => 1,
//                'guardian_id' => 1,
//                'user_id' => 1,
//                'patient_nationalid' => rand(100000000000,999999999999),
//                'patient_firstname' => 'Dimitris',
//                'patient_lastname' => 'Danampasis',
//                'patient_dob' => '02/04/1986',
//                'patient_gender' => 'Male',
//                'patient_insurance' => 'AB666666'
//            )
//        );
//        DB::table('patients')->insert(
//            array(
//                'contact_id' => 2,
//                'guardian_id' => 2,
//                'user_id' => 2,
//                'patient_nationalid' => rand(100000000000,999999999999),
//                'patient_firstname' => 'Olga',
//                'patient_lastname' => 'Triantou',
//                'patient_dob' => '02/04/1956',
//                'patient_gender' => 'Female',
//                'patient_insurance' => 'AB555555'
//            )
//        );
//        DB::table('patients')->insert(
//            array(
//                'contact_id' => 3 ,
//                'guardian_id' => 3,
//                'user_id' => 3,
//                'patient_nationalid' => rand(100000000000,999999999999),
//                'patient_firstname' => 'Tina',
//                'patient_lastname' => 'Mpitouni',
//                'patient_Dob' => '02/04/1986',
//                'patient_gender' => 'Female',
//                'patient_insurance' => 'AB222222'
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
        Schema::table('patients', function($table)
        {
            $table->dropForeign('patients_user_id_foreign');
            $table->dropColumn('user_id');
//            $table->dropForeign('patients_user_id_foreign');
//            $table->dropColumn('guardian_id');
//            $table->dropForeign('patients_user_id_foreign');
//            $table->dropColumn('contact_id');

        });
        Schema::drop('patients');
    }
}
