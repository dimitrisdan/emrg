<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    
    public function postSignUp(Request $request)
    {
        echo 'ap';
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'name' => 'required|max:100',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->email = $request['email'];
        $user->name = $request['name'];
        $user->password = bcrypt($request['password']);
//
//        Auth::login($user);
//
//        return redirect()->route('dashboard');
    }

    /**
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

            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
