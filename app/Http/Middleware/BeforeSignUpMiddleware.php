<?php

namespace App\Http\Middleware;

use Closure;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class BeforeSignUpMiddleware
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
        // create a log channel
        $log = new Logger('security');
        $log->pushHandler(new StreamHandler( storage_path().'/logs/security_logs/requests.log', Logger::WARNING));

        // add a record to the log
        $log->warning('SignUpRequest|'. $request->input('email') . '|attempt');

        return $next($request);
    }
}
