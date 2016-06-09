<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalalertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalAlerts', function (Blueprint $table) {
            $table->increments('medical_alertid');
            $table->string('medicalAlertDescr');
            $table->timestamps();
        });
        DB::table('medicalAlerts')->insert(
            array(
                'medical_alertid' => 1,
                'medicalAlertDescr' => 'Intolerance to aspirin due to gastrointestinal bleeding.',
                'created_at' => date("Y-m-d H:i:s")
            )
        );
        DB::table('medicalAlerts')->insert(
            array(
                'medical_alertid' => 2,
                'medicalAlertDescr' => 'Intolerance to captopril because of cough',
                'created_at' => date("Y-m-d H:i:s")
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
        Schema::drop('medicalAlerts');
    }
}
