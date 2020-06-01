<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        /* http://micro.com */
        return $next($request)->header('Access-Control-Allow-Origin', '*', 'http://micro-anime.com')
        ->header('Access-Control-Allow-Methods','GET')
        ->header('Content-Type','application/json', 'application/javascript');
    }
}
