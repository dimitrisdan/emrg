<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
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

        $user = new User();
        $user -> email = $request['email'];
        $user -> first_name = Crypt::encrypt($request['first_name']);
        $user -> last_name = Crypt::encrypt($request['last_name']);
        $user -> password = bcrypt($request['password']);
        $user -> save();

        Auth::login($user);
        
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

        if (Auth::attempt([ 'email' => $request['email'], 'password' => $request['password']] )){
            Session::put('user_name', Crypt::decrypt($request->user()->last_name) . ' ' . Crypt::decrypt($request->user()->last_name));
            Session::put('user_email', $request->user()->email);
            return redirect()->route('dashboard');
        }else
//            echo Auth::attempt([ 'email' => $request['email'], 'password' => $request['password']] );
        return redirect()->back();
    }

    /**
     * User Logout
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogout()
    {
        Session::forget('user_name');
        Session::forget('user_email');
        Auth::logout();
        return view('welcome');
    }
}
