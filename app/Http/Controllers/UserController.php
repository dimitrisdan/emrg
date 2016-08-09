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
use Ixudra\Curl\Facades\Curl;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function postForgotPassword(Request $request)
    {
        
    }
    public function checkRolesToken(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('doc')) {
            return redirect()->route('dashboard.doctor')->with([
                'msg-status' => Session::get('msg-status'),
                'msg-message' => Session::get('msg-message')
            ]);
        } elseif ($user->hasRole('pat')) {
            return redirect()->route('dashboard.patient')->with([
                'msg-status' => Session::get('msg-status'),
                'msg-message' => Session::get('msg-message')
            ]);
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('dashboard.admin')->with([
                'msg-status' => Session::get('msg-status'),
                'msg-message' => Session::get('msg-message')
            ]);
        }
    }

    public function createRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->role_name;
        $role->display_name = $request->role_display_name; // optional
        $role->description = $request->role_description; // optional
        $role->save();

        $log = new Logger('user_security');
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/user/' . Auth::id() . '/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|UserId:' . Auth::id() . '|createRole|RoleId:' . $role->id);

        return redirect()->route('dashboard')->with([
            'msg-status' => 1,
            'msg-message' => 'Role created.'
        ]);
    }

    public function deleteRole(Request $request)
    {
        $role = new Role;
        $role->destroy($request['role_id']);

        $log = new Logger('user_security');
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/user/' . Auth::id() . '/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|UserId:' . Auth::id() . '|deleteRole|RoleId:' . $request['role_id']);

        return redirect()->route('dashboard')->with([
            'msg-status' => '2',
            'msg-message' => 'Role deleted.'
        ]);
    }

    public function createPermission(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->per_name;
        $permission->display_name = $request->per_display_name; // optional
        $permission->description = $request->per_description; // optional
        $permission->save();

        $log = new Logger('user_security');
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/user/' . Auth::id() . '/requests.log', Logger::INFO));
        $log->info('From:' . Session::get('user_email') . '|UserId:' . Auth::id() . '|createPermission|PermissionId:' . $permission->id);
    }

    /**
     * New Users Sign-Up
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'required|min:4'
        ]);

        $log = new Logger('security');
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/requests.log', Logger::INFO));
        $log->info('From:' . $request->input('email') . '|SignUp|Attempt');

        $user = new User();
        $user->email = $request['email'];
        $user->first_name = Crypt::encrypt($request['first_name']);
        $user->last_name = Crypt::encrypt($request['last_name']);
        $user->phone_number = $request['phone_number'];
        $user->phone_country_code = '45';
        $user->password = bcrypt($request['password']);
        $user->save();
        
        $role = Role::where('name', '=', $request['role'])->first();
        $user->attachRole($role->id);

        $log->info('From:' . $request->input('email') . '|AssignedRole|Success');
        $log->info('From:' . $request->input('email') . '|SignUp|Success');

        $authy_api_key = env('AUTHY_LIVE_KEY');
        $url =  'https://api.authy.com/protected/json/users/new?api_key=' .$authy_api_key;

//        echo $user->email.'<br>';
//        echo $user->phone_number.'<br>';
//        echo $user->phone_country_code.'<br>';
        $register_response = Curl::to($url)
            ->withData( array(
                'user[email]' => $user->email ,
                'user[cellphone]' => $user->phone_number,
                'user[country_code]' => $user->phone_country_code
            ) )
            ->enableDebug(storage_path() . '/logs/authy/logFile.txt')
            ->post();

        $json = json_decode($register_response, true);
//        echo '<pre>reg<br>' . print_r($json, true) . '</pre>';

        $user->authy_id = $json['user']['id'];
        $user->update();

        Auth::login($user);

        $sms_response = Curl::to('https://api.authy.com/protected/json/sms/'.$user->authy_id.'?api_key=KShA2sDrQupg8zjTYRPpbeKU3Yvq69cz')
            ->get();

        $json_sms = json_decode($sms_response, true);

        if (!$json['success'] || !$json_sms['success']){
//            echo '<pre>paok' . print_r($json_sms, true) . '</pre>';
            return view('errors.503');
        }
        else
        {
            Session::forget('user_name');
            Session::forget('user_email');
            Session::put('user_name', Crypt::decrypt($user->first_name) . ' ' . Crypt::decrypt($user->last_name));
            Session::put('user_email', $user->email);

            $log = new Logger('user_security');
            $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/user/' . Auth::id() . '/requests.log', Logger::INFO));
            $log->info('From:' . Session::get('user_email') . '|UserId:' . Auth::id() . '|SignIn|Success');

            return view('twofactor');
        }
    }

    /**
     * Sign-In for registered users
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $log = new Logger('security');
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/requests.log', Logger::INFO));
        $log->info('From:' . $request->input('email') . '|SignIn|Attempt');

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {

            $user = Auth::user();
            $sms_response = Curl::to('https://api.authy.com/protected/json/sms/'.$user->authy_id.'?api_key=KShA2sDrQupg8zjTYRPpbeKU3Yvq69cz')
                ->get();

            
            $json_sms = json_decode($sms_response, true);
            if (!$json_sms['success']){
//            echo '<pre>paok' . print_r($json_sms, true) . '</pre>';
                return view('errors.503');
            }
            else
            {
                Session::put('user_name', Crypt::decrypt($request->user()->first_name) . ' ' . Crypt::decrypt($request->user()->last_name));
                Session::put('user_email', $request->user()->email);

                $log = new Logger('user_security');
                $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/user/' . Auth::id() . '/requests.log', Logger::INFO));
                $log->info('From:' . Session::get('user_email') . '|UserId:' . Auth::id() . '|SignIn|Success');

                return view('twofactor');
            }


        } else {
            $log->info('From:' . $request->input('email') . '|SignIn|Failed');
        }

        return redirect()->back()->with([
            'msg-status' => '2',
            'msg-message' => 'Login failed. Email or password incorrect!'
        ]);
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
        $log->pushHandler(new StreamHandler(storage_path() . '/logs/security_logs/requests.log', Logger::INFO));
        // add a record to the log

        $log->info('From:' . Session::get('user_email') . '|LogOut|Attempt');

        Auth::logout();

        if (!Auth::check()) {
            $log->info('From:' . Session::get('user_email') . '|LogOut|Success');
        }
//        Session::flush();
        return redirect()->route('home');
    }
    public function getTwoFactor()
    {
        return view('twofactor');
    }
}
