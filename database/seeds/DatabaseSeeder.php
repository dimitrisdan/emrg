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
        DB::table('roles')->insert([
                'id' => 1,
                'name' => 'pat',
                'display_name' => 'Patient',
                'description' => 'Patient is allowed...'
            ]
        );

        DB::table('roles')->insert([
                'id' => 11,
                'name' => 'doc',
                'display_name' => 'Doctor',
                'description' => 'Doctor is allowed...'
            ]
        );

        DB::table('permissions')->insert([
                'name' => 'view-patient',
                'display_name' => 'View Patient Dashboard',
                'description' => 'A user can view the patient\'s Dashboard'
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'edit-patient',
                'display_name' => 'Edit Patient Dashboard',
                'description' => 'A user can edit the content of patient\'s the Dashboard'
            ]
        );
        DB::table('permissions')->insert([
                'name' => 'view-doctor',
                'display_name' => 'View Doctor\'s Dashboard',
                'description' => 'A user can view the content of the doctor\'s Dashboard'
            ]
        );

        DB::table('permission_role')->insert(
            [
                'permission_id' => 1,
                'role_id' => 1
            ]
        );

        DB::table('permission_role')->insert(
            [
                'permission_id' => 11,
                'role_id' => 1
            ]
        );

        DB::table('permission_role')->insert(
            [
                'permission_id' => 21,
                'role_id' => 11
            ]
        );

        DB::table('users')->insert([
            'id' => 1,
            'first_name' => Crypt::encrypt('Anna'),
            'last_name' => Crypt::encrypt('Pain'),
            'email' => 'ap@gmail.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
            'id' => 11,
            'first_name' => Crypt::encrypt('Irina'),
            'last_name' => Crypt::encrypt('Jorgensen'),
            'email' => 'ij@gmail.com',
            'password' => bcrypt('test'),
        ]);
        DB::table('users')->insert([
            'id' => 21,
            'first_name' => Crypt::encrypt('Michael'),
            'last_name' => Crypt::encrypt('Jackson'),
            'email' => 'mj@gmail.com',
            'password' => bcrypt('test'),
        ]);
        DB::table('users')->insert([
            'id' => 31,
            'first_name' => Crypt::encrypt('Kley'),
            'last_name' => Crypt::encrypt('Thompson'),
            'email' => 'kt@gmail.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
            'id' => 41,
            'first_name' => Crypt::encrypt('Kyrie'),
            'last_name' => Crypt::encrypt('Irving'),
            'email' => 'ki@gmail.com',
            'password' => bcrypt('test'),
        ]);
        DB::table('users')->insert([
            'id' => 51,
            'first_name' => Crypt::encrypt('John'),
            'last_name' => Crypt::encrypt('Snow'),
            'email' => 'js@gmail.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
            'id' => 61,
            'first_name' => Crypt::encrypt('Mike'),
            'last_name' => Crypt::encrypt('Doc'),
            'email' => 'mikedoc@hospital.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
            'id' => 71,
            'first_name' => Crypt::encrypt('Alice'),
            'last_name' => Crypt::encrypt('Doc'),
            'email' => 'alicedoc@hospital.com',
            'password' => bcrypt('test'),
        ]);

        DB::table('role_user')->insert([
                'user_id' => 1,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 11,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 21,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 31,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 41,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 51,
                'role_id' => 1
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 61,
                'role_id' => 11
            ]
        );

        DB::table('role_user')->insert([
                'user_id' => 71,
                'role_id' => 11
            ]
        );

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
            'profession' => 'Cardiologist'
        ]);
        DB::table('doctors')->insert([
            'user_id' => 71,
            'profession' => 'Dermatologist'
        ]);

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

        DB::table('roles')->insert([
                'id' => 21,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Administrator is allowed...'
            ]
        );

        DB::table('users')->insert([
            'id' => 81,
            'first_name' => Crypt::encrypt('The'),
            'last_name' => Crypt::encrypt('Force'),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('role_user')->insert([
                'user_id' => 81,
                'role_id' => 21
            ]
        );
        DB::table('permissions')->insert([
                'id' => 31,
                'name' => 'view-admin',
                'display_name' => 'View Admin\'s Dashboard',
                'description' => 'A user has the permission to view the content of the admin\'s Dashboard'
            ]
        );
        DB::table('permission_role')->insert([
                'permission_id' => 31,
                'role_id' => 21
            ]
        );

    }
}
