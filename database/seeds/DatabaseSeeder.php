<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        



        

        

        DB::table('medical_alerts')->insert(
            array(
                'medicalalert_description' => 'Intolerance to aspirin due to gastrointestinal bleeding.',
            )
        );
        DB::table('medical_alerts')->insert(
            array(
                'medicalalert_description' => 'Intolerance to captopril because of cough',
            )
        );

    }
}
