<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergyagentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergyAgents', function (Blueprint $table) {
            $table->increments('allergy_agentid');
            $table->string('allergyAgentDescription');
            $table->timestamps();
        });

        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 1,
                'allergyAgentDescription' => 'Sulfonamides',
            )
        );
        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 2,
                'allergyAgentDescription' => 'Tetracycline',
            )
        );

        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 3,
                'allergyAgentDescription' => 'Garlic',
            )
        );

        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 4,
                'allergyAgentDescription' => 'Meat',
            )
        );
        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 5,
                'allergyAgentDescription' => 'Peanut',
            )
        );
        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 6,
                'allergyAgentDescription' => 'Egg',
            )
        );
        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 7,
                'allergyAgentDescription' => 'Perfume',
            )
        );
        DB::table('allergyAgents')->insert(
            array(
                'allergy_agentid' => 8,
                'allergyAgentDescription' => 'Insect sting',
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
        Schema::drop('allergyAgents');
    }
}
