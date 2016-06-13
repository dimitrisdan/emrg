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
        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'password' => 'required|min:4'
        ]);

        $user = new User();
        $user -> email = $request['email'];
        $user -> first_name = $request['first_name'];
        $user -> last_name = $request['last_name'];
        $user -> password = bcrypt($request['password']);
        $user -> save();

        Auth::login($user);
        
        return redirect()->route('dashboard');
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
        return redirect()->view('welcome');
    }
}
