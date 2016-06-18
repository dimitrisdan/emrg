<?php

namespace App\Http\Middleware;

use Closure;

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
    protected $path;
    protected $stream;

    public function __construct()
    {
        $this->path = storage_path();
        $this->stream = new StreamHandler($this->path.'/my_app.log', Logger::DEBUG);
    }

    public function handle($request, Closure $next)
    {
        $logger = new Logger('my_logger');
        $logger->pushHandler($this->stream);

        $securityLogger = new Logger('security');
        $securityLogger->pushHandler($this->stream);

//        $logger->addInfo($request->user())
        return $next($request);
    }
}
