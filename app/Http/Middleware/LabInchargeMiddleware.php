<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabInchargeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role=='admin@64XJDH' OR Auth::user()->role=='labincharge@64XJDH'){
            return $next($request);
        }else{
            echo "You are not Lab incharge";
        }
    }
}
