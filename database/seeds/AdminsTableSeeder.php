<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
