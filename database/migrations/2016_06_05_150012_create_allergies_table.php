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
            $table->integer('allergy_agentid')->unsigned();
            $table->string('allergyDescription');
            $table->date('allergyOnsetDate');
            $table->timestamps();
            # Foreign Keys
            $table->foreign('allergy_agentid')->references('allergy_agentid')->on('allergyAgents');
        });
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 1,
                'allergy_agentid' => 1,
                'allergyDescription' => 'anaphylactic shock',
                'allergyOnsetDate' => date("Y-m-d H:i:s"),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 2,
                'allergy_agentid' => 2,
                'allergyDescription' => 'angioedema',
                'allergyOnsetDate' => date("Y-m-d H:i:s"),
            )
        );

        DB::table('allergys')->insert(
            array(
                'allergy_id' => 3,
                'allergy_agentid' => 3,
                'allergyDescription' => 'swollen lips',
                'allergyOnsetDate' => date("Y-m-d H:i:s"),
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
        Schema::drop('allergys');
    }
}
