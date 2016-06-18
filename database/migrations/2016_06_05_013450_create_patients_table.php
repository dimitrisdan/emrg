<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * Class CreatePatientsTable
 * 
 * Patient's Database Migration 
 */
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
            # Primary Key
            $table->increments('patient_id');
            
            # Attributes
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('guardian_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('patient_nationalid', 500)->nullable();
            $table->string('patient_dob')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_insurance', 500)->nullable();
            $table->timestamps();
            
            # Foreign Keys
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->ondelete('cascade');
            
            $table->foreign('guardian_id')
                ->references('guardian_id')->on('guardians')
                ->ondelete('set null');
            
            $table->foreign('contact_id')
                ->references('contact_id')->on('contacts')
                ->ondelete('set null');
        });
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
            $table->dropForeign('patients_contact_id_foreign');
            $table->dropForeign('patients_guardian_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('contact_id');
            $table->dropColumn('guardian_id');
        });
        
        Schema::drop('patients');
    }
}
