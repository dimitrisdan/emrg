<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Srmklive\Authy\Facades\Authy;

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

        try
        {
            Authy::getProvider()->sendSmsToken($user);
        } 
        catch (Exception $e)
        {
            app(ExceptionHandler::class)->report($e);
            return response()->json(['error' => ['Unable To Send 2FA Login Token']], 422);
        }

        return $response;

    }
}
