<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $user = Auth::user();
        $token = $request->input('authy_token');
        $verify_token = Curl::to('https://api.authy.com/protected/json/verify/' . $token . '/'.$user->authy_id.'?api_key=KShA2sDrQupg8zjTYRPpbeKU3Yvq69cz')
            ->get();

        $json = json_decode($verify_token, true);
        if ($json['token'] == "is valid"){
            return $response;
        }else
            return view('errors.503');
    }
}
