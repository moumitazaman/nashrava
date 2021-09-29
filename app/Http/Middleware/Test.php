<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Test
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
        return $next($request);
    }
    else{
        return redirect('login');
       /* return redirect()->back();*/
    }

    /*For Multiple Dashboard

     if(Auth::check()){
       
        if(Auth::user()->usertype=='HR_Panel'){
             //dd('Go to Hr dashboard');
            return redirect()->route('hr.dashboard');
        }elseif(Auth::user()->usertype=='ACCOUNTS_Panel'){
            //dd('Go to Wevsite dashboard');
             return redirect()->route('accounts.dashboard');
        }
    }
    else{
        return redirect('login');
       
    }


    */



}
}
