<?php

namespace App\Http\Middleware;

use Closure;

class IsStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     /**
      * Use to check the usertype from single "users" table.
      */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->usertype == "Staff"){
            return $next($request);
        }

        return redirect('/')->with('error',"You don't have access.");
    }
}
