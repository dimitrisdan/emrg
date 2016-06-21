<?php

use Illuminate\Database\Seeder;

class AllergiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        DB::table('allergys')->insert(
            array(
                'allergy_id' => 1,
                'allergy_agent_id' => 1,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 11,
                'allergy_agent_id' => 2,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 21,
                'allergy_agent_id' => 3,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 31,
                'allergy_agent_id' => 4,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 41,
                'allergy_agent_id' => 4,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 51,
                'allergy_agent_id' => 5,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('allergys')->insert(
            array(
                'allergy_id' => 61,
                'allergy_agent_id' => 5,
                'allergy_description' => 'Pain',
                'allergy_onset' => date('Y-m-d'),
            )
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 1,
                'allergy_id' => 1,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 1,
                'allergy_id' => 11,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 1,
                'allergy_id' => 21,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 11,
                'allergy_id' => 41,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 11,
                'allergy_id' => 51,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 21,
                'allergy_id' => 21,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 21,
                'allergy_id' => 31,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 31,
                'allergy_id' => 31,
            ]
        );
        DB::table('patient_allergy_alerts')->insert([
                'patient_id' => 41,
                'allergy_id' => 61,
            ]
        );
    }
}
