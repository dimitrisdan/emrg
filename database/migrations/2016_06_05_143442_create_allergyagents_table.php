<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAllergyagentsTable
 * 
 * Allergy Agent Database Migration
 */
class CreateAllergyagentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergy_agents', function (Blueprint $table) {
            # Primary Key
            $table->increments('allergy_agent_id');
            
            # Attributes
            $table->string('allergy_agent_description');
            $table->timestamps();
        });

        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 1,
                'allergy_agent_description' => 'Sulfonamides',
            )
        );
        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 2,
                'allergy_agent_description' => 'Tetracycline',
            )
        );

        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 3,
                'allergy_agent_description' => 'Garlic',
            )
        );

        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 4,
                'allergy_agent_description' => 'Meat',
            )
        );
        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 5,
                'allergy_agent_description' => 'Peanut',
            )
        );
        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 6,
                'allergy_agent_description' => 'Egg',
            )
        );
        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 7,
                'allergy_agent_description' => 'Perfume',
            )
        );
        DB::table('allergy_agents')->insert(
            array(
                'allergy_agent_id' => 8,
                'allergy_agent_description' => 'Insect sting',
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
        Schema::drop('allergy_agents');
    }
}
