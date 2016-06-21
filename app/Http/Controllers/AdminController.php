<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class AdminController extends Controller
{
    public function getDashboard(Request $request)
    {
        $roles = DB::table('roles')->get();
        $permissions = DB::table('permissions')->get();
        $data = [
            'roles' => $roles,
            'permissions'=> $permissions
        ];
//        echo '<pre>';
//        print_r($data['permissions']);
//        echo '</pre>';
        return view('dashboard', $data);
    }
}
