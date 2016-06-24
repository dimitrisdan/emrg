<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Role;

class AdminController extends Controller
{
    public function getDashboard(Request $request)
    {
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $permissions = DB::table('permissions')->get();
        $roles_permissions = DB::table('permission_role')->get();
        $roles_users = DB::table('role_user')->get();


        foreach ($users as $user)
        {
            $roles_user = DB::table('role_user')->where('user_id', '=', $user->id)->get();

            foreach ($roles_user as $role_user)
            {
                $role = Role::findorfail($role_user->role_id);

                $role_permissions = [];

                foreach ($roles_permissions as $role_permission)
                {
                    $permission = Permission::findorfail($role_permission->permission_id);
                    array_push($role_permissions, $permission->name);

                }
                $users_info[$user->email] = [
                    'role' => $role->display_name,
                    'permissions' => $role_permissions
                ];
            }
        }

        $data = [
//            'users' => $users,
            'roles' => $roles,
            'permissions'=> $permissions,
//            'role_permissions' => $roles_permissions,
//            'role_users' => $roles_users,
            'users_info' => $users_info
        ];

//        echo '<pre>';
//        print_r($data['users_info']);
//        echo '</pre>';
        return view('dashboard', $data);
    }
}
