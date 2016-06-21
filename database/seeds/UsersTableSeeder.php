<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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

    }
}
