<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergys', function (Blueprint $table) {
            $table->increments('allergy_id');
            $table->integer('allergy_agent_id')->unsigned()->nullable();
            $table->string('allergy_description')->nullable();
            $table->date('allergy_onset')->nullable();
            $table->timestamps();
            # Foreign Keys
            $table->foreign('allergy_agent_id')->references('allergy_agent_id')->on('allergyagents');
        });
        
//        DB::table('allergys')->insert(
//            array(
//                'allergy_id' => 1,
//                'allergy_agentid' => 1,
//                'allergyDescription' => 'anaphylactic shock',
//                'allergyOnsetDate' => date("Y-m-d H:i:s"),
//            )
//        );
//        DB::table('allergys')->insert(
//            array(
//                'allergy_id' => 2,
//                'allergy_agentid' => 2,
//                'allergyDescription' => 'angioedema',
//                'allergyOnsetDate' => date("Y-m-d H:i:s"),
//            )
//        );
//
//        DB::table('allergys')->insert(
//            array(
//                'allergy_id' => 3,
//                'allergy_agentid' => 3,
//                'allergyDescription' => 'swollen lips',
//                'allergyOnsetDate' => date("Y-m-d H:i:s"),
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
        Schema::drop('allergys');
    }
}
