<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Zizaco\Entrust\Traits\EntrustUserTrait;



/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function checkRoles()
    {
        $user = Auth::user();
        
        if ($user->hasRole('doc'))
        {
            return redirect()->route('dashboard.doctor');
        }
        elseif ($user->hasRole('pat'))
        {
            return redirect()->route('dashboard.patient');
        }
        elseif ($user->hasRole('admin'))
        {
            return redirect()->route('dashboard.admin');
        }
    }

    public function createRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->role_name;
        $role->display_name = $request->role_display_name; // optional
        $role->description  = $request->role_description; // optional
        $role->save();
    }

    public function createPermission(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->per_name;
        $permission->display_name = $request->per_display_name; // optional
        $permission->description  = $request->per_description; // optional
        $permission->save();
    }

    /**
     * New Users Sign-Up 
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'required|min:4'
        ]);

        $log = new Logger('security');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/security_logs/requests.log', Logger::INFO));
        $log->info('From:' . $request->input('email') . '|SignUp|Attempt');

        $user = new User();
        $user -> email = $request['email'];
        $user -> first_name = Crypt::encrypt($request['first_name']);
        $user -> last_name = Crypt::encrypt($request['last_name']);
        $user -> password = bcrypt($request['password']);
        $user -> save();

        $role = Role::where('name','=', $request['role'])->first();
        $user->attachRole($role->id);
        
        $log->info('From:' . $request->input('email') . '|AssignedRole|Success');
        $log->info('From:' . $request->input('email') . '|SignUp|Success');
        $log->info('From:' . $request->input('email') . '|SignIn|Attempt');

        Auth::login($user);
        
        $log->info('From:' . Auth::user()->email . '|Id:'. Auth::id() .'|SignIn|Success|');

        Session::forget('user_name');
        Session::forget('user_email');
        Session::put('user_name', Crypt::decrypt($user->first_name) . ' ' . Crypt::decrypt($user->last_name));
        Session::put('user_email', $user->email);

        return redirect()->route('dashboard');
    }

    /**
     * Sign-In for registered users
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        // create a log channel
        $log = new Logger('security');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/security_logs/requests.log', Logger::INFO));
        // add a record to the log
        $log->info('From:' . $request->input('email') .'|SignIn|Attempt');
        
        
        if (Auth::attempt([ 'email' => $request['email'], 'password' => $request['password']] )){

//            $role = Role::findOrFail(1);
//            $user = User::where('email', '=', $request['email'])->first();
//            $user->attachRole($role);

            Session::put('user_name', Crypt::decrypt($request->user()->first_name) . ' ' . Crypt::decrypt($request->user()->last_name));
            Session::put('user_email', $request->user()->email);
            
            $log->info('From:' . Session::get('user_email') . '|Id:'. Auth::id() .'|SignIn|Success');
            
            return redirect()->route('dashboard');
        
        }else {
            $log->info('From:' . $request->input('email') . '|SignIn|Failed');
        }
        return redirect()->back();
    }

    /**
     * User Logout
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogout()
    {
        // create a log channel
        $log = new Logger('security');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/security_logs/requests.log', Logger::INFO));
        // add a record to the log
        
        $log->info('From:' . Session::get('user_email') . '|LogOut|Attempt');
    
        Auth::logout();
        if(!Auth::check())
        {
            $log->info('From:' . Session::get('user_email') . '|LogOut|Success');
        }
        Session::forget('user_name');
        Session::forget('user_email');
        return redirect()->route('home');
    }
}
