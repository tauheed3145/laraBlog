<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class Admin
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

        if(Auth::check()){
         
            if(Auth::user()->name=='tauheed'){
               
              //dd("i am admin");
             }
             else
             {
               
             }
        }
         
        
        //return $next($request);
    }
}
