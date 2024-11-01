<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if($request->is('/') || $request->is('/*') ){
        //     // return dd($request);
        //     if(!empty(Auth::guard()->user())){              //// if user->guard'emp' is logged in then redirect to EMP/dashboard
        //         return redirect()->route('emp.dashboard');
        //     }
        // }
        // return dd($request);
        if (Auth::check()) {
            if(Auth()->user()->roles == "admin"){
                return redirect()->route("doctor.dashboard");
            }elseif(Auth()->user()->roles == "doctors"){
                return redirect()->route("doctor.dashboard");
            }
            elseif(Auth()->user()->roles == "user"){
                return redirect()->route("user.dashboard");
            }else{
                return redirect()->route("login")->with('error', 'Invalid Role');
            }
        }
        return $next($request);
    }
}
