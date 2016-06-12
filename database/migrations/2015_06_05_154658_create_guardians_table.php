<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('guardian_id');
            $table->string('guardian_role')->nullable();
            $table->string('guardian_firstname')->nullable();
            $table->string('guardian_lastname')->nullable();
            $table->string('guardian_telephone')->nullable();
            $table->string('guardian_email')->nullable();
            $table->timestamps();
        });

//        DB::table('guardians')->insert(
//            array(
//                'guardian_id' => 1,
//                'guardian_role' => 'legal',
//                'guardian_firstname' => 'Loukas',
//                'guardian_lastname' => 'Danampasis',
//                'guardian_telephone' => '30140917',
//                'guardian_email' => 'ld@csl.gr',
//            )
//        );
//        
//        DB::table('guardians')->insert(
//            array(
//                'guardian_id' => 2,
//                'guardian_role' => 'contact',
//                'guardian_firstname' => 'Manolis',
//                'guardian_lastname' => 'Xiotis',
//                'guardian_telephone' => '30876917',
//                'guardian_email' => 'mx@csl.gr',
//            )
//        );
//        DB::table('guardians')->insert(
//            array(
//                'guardian_id' => 3,
//                'guardian_role' => 'contact',
//                'guardian_firstname' => 'Stefanos',
//                'guardian_lastname' => 'Xios',
//                'guardian_telephone' => '24435672',
//                'guardian_email' => 'sx@csl.gr',
//            )
//        );
//        DB::table('guardians')->insert(
//            array(
//                'guardian_id' => 4,
//                'guardian_role' => 'contact',
//                'guardian_firstname' => 'Manolis',
//                'guardian_lastname' => 'Mitsias',
//                'guardian_telephone' => '27436583',
//                'guardian_email' => 'mm@csl.gr',
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
        Schema::drop('guardians');
    }
}
