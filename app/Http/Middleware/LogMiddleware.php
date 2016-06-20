<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Log;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    protected $path;
//    protected $stream;

//    public function __construct()
//    {
//        $this->path = storage_path();
//        $this->stream = new StreamHandler($this->path.'/my_app.log', Logger::DEBUG);
//    }


    public function handle($request, Closure $next)
    {
//        print '<pre>';
//        print_r($request);
//        print '</pre>';
//        $request->user();
        
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler( storage_path().'/requests.log', Logger::WARNING));

        // add records to the log
        $log->warning('SignUpRequest:'. $request->input('email'));
        


//        $logger = new Logger('my_logger');
//        $logger->pushHandler($this->stream);
//
//        $securityLogger = new Logger('security');
//        $securityLogger->pushHandler($this->stream);

//        $logger->addInfo($request->user())
        return $next($request);
    }
}
