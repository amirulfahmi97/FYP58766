<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->usertype == "Admin"){
            return $next($request);
        }
        return redirect('/')->with('error',"You don't have admin access.");
    }
}
