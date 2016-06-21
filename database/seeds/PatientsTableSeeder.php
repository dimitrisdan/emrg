<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guardians')->insert([
            'guardian_id' => 1,
            'guardian_role' => 'contact',
            'guardian_firstname' => Crypt::encrypt('Katerina'),
            'guardian_lastname' => Crypt::encrypt('Poulsen'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('kp@hotmail.com')
        ]);
        DB::table('guardians')->insert([
            'guardian_id' => 11,
            'guardian_role' => 'contact',
            'guardian_firstname' => Crypt::encrypt('Jonas'),
            'guardian_lastname' => Crypt::encrypt('Kolka'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('kp@hotmail.com')
        ]);
        DB::table('guardians')->insert([
            'guardian_id' => 21,
            'guardian_role' => 'contact',
            'guardian_firstname' => Crypt::encrypt('James'),
            'guardian_lastname' => Crypt::encrypt('Coltrane'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('kp@hotmail.com')
        ]);
        DB::table('guardians')->insert([
            'guardian_id' => 31,
            'guardian_role' => 'legal',
            'guardian_firstname' => Crypt::encrypt('Jim'),
            'guardian_lastname' => Crypt::encrypt('Mcdaniels'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('kp@hotmail.com')
        ]);
        DB::table('guardians')->insert([
            'guardian_id' => 41,
            'guardian_role' => 'legal',
            'guardian_firstname' => Crypt::encrypt('Andreas'),
            'guardian_lastname' => Crypt::encrypt('Nielsen'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('kp@hotmail.com')
        ]);
        DB::table('guardians')->insert([
            'guardian_id' => 51,
            'guardian_role' => 'contact',
            'guardian_firstname' => Crypt::encrypt('Giannis'),
            'guardian_lastname' => Crypt::encrypt('Antentokoumpo'),
            'guardian_telephone' => Crypt::encrypt('30221185'),
            'guardian_email' => Crypt::encrypt('ga@hotmail.com')
        ]);
        
        DB::table('contacts')->insert([
            'contact_id' => 1,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('33'),
            'contact_city' => 'Vanlose',
            'contact_postcode' => '2720',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);
        DB::table('contacts')->insert([
            'contact_id' => 11,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('12'),
            'contact_city' => 'Valby',
            'contact_postcode' => '2100',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);
        DB::table('contacts')->insert([
            'contact_id' => 21,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('11'),
            'contact_city' => 'Copenhagen',
            'contact_postcode' => '2300',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);
        DB::table('contacts')->insert([
            'contact_id' => 31,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('25'),
            'contact_city' => 'Vanlose',
            'contact_postcode' => '2720',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);
        DB::table('contacts')->insert([
            'contact_id' => 41,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('56'),
            'contact_city' => 'Vanlose',
            'contact_postcode' => '2720',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);
        DB::table('contacts')->insert([
            'contact_id' => 51,
            'contact_telephone' => Crypt::encrypt('+4530000917'),
            'contact_street' => Crypt::encrypt('Kirkebjerg Alle'),
            'contact_number' => Crypt::encrypt('25'),
            'contact_city' => 'Vanlose',
            'contact_postcode' => '2720',
            'contact_state' => 'Copenhagen',
            'contact_country' => 'Denmark',
            'contact_hpid' => 1,
        ]);

        DB::table('patients')->insert([
            'user_id' => 1,
            'contact_id' => 1,
            'guardian_id' => 1,
            'patient_cpr' => Crypt::encrypt('020486-4691'),
            'patient_dob' => '27/05/1986',
            'patient_gender' => 'female',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);
        DB::table('patients')->insert([
            'user_id' => 11,
            'contact_id' => 11,
            'guardian_id' => 11,
            'patient_cpr' => Crypt::encrypt('420696-4341'),
            'patient_dob' => '27/05/1996',
            'patient_gender' => 'male',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);
        DB::table('patients')->insert([
            'user_id' => 21,
            'contact_id' => 21,
            'guardian_id' => 21,
            'patient_cpr' => Crypt::encrypt('020486-4691'),
            'patient_dob' => '27/05/1986',
            'patient_gender' => 'female',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);
        DB::table('patients')->insert([
            'user_id' => 31,
            'contact_id' => 31,
            'guardian_id' => 31,
            'patient_cpr' => Crypt::encrypt('15031976-3320'),
            'patient_dob' => '15/03/1976',
            'patient_gender' => 'male',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);
        DB::table('patients')->insert([
            'user_id' => 41,
            'contact_id' => 41,
            'guardian_id' => 41,
            'patient_cpr' => Crypt::encrypt('15031976-4691'),
            'patient_dob' => '15/03/1976',
            'patient_gender' => 'female',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);
        DB::table('patients')->insert([
            'user_id' => 51,
            'contact_id' => 51,
            'guardian_id' => 51,
            'patient_cpr' => Crypt::encrypt('15031976-4691'),
            'patient_dob' => '15/03/1976',
            'patient_gender' => 'female',
            'patient_insurance' => Crypt::encrypt('QQ 12 34 56 A'),
        ]);

        DB::table('doctors')->insert([
            'user_id' => 61,
        ]);
        DB::table('doctors')->insert([
            'user_id' => 71,
        ]);
    }
}
