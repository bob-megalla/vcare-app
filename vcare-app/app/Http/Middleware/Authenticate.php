<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            return redirect()->route('indexLogin');
        }
        if(auth()->user()->roles =="user"){
            if($request->is('admin/*')){
                return redirect()->route('user.dashboard');
                // return dd('test');
            }elseif($request->is('doctors/*')){
                return redirect()->route('user.dashboard');
            }
        }
        if(auth()->user()->roles =="doctors"){
            if($request->is('admin/*')){
                return redirect()->route('doctor.dashboard');
            }elseif($request->is('user/*')){
                return redirect()->route('doctor.dashboard');
            }
        }
        if(auth()->user()->roles =="admin"){
            if($request->is('doctors/*')){
                return redirect()->route('admin.dashboard');
            }elseif($request->is('user/*')){
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
