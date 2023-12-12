<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //echo "hello check age middleware on single route";
        if($request->age > 18){
            echo "You are greater thamn 18 year";
        }
        else{
            echo "Sorry, you are less than 18 year";
        }
        return $next($request);
    }
}
