<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Response;
use Closure;

class IpMiddleware
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
        if ($request->ip() != "127.0.0.1") {
        // here insted checking single ip address we can do collection of ip 
        //address in constant file and check with in_array function
            return Response::json("denied",500);
        }

        return $next($request);
    }
}
