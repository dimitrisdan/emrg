<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\FirePHPHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class AfterSignUpMiddleware
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

        // create a log channel
        $log = new Logger('security');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/security_logs/requests.log', Logger::INFO));
        // add a record to the log
        $log->info('SignUpRequest|'. $request->input('email') . '|success');
        return $response;
    }
}
