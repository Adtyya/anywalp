<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        // role boolean = 1. Jika 0 akan di abort !role berarti nilainya 0 
        if(auth()->guest() || !auth()->user()->role){
            abort(403);
        }
        return $next($request);
    }
}
