<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthEmployee
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->Utype === 'EMP') {

                return $next($request);

            }elseif(Auth::user()->Utype === 'ADM') {
                return redirect()->route('admin.index');
            } 
            
            else {
                session()->flash('error', 'You are not authorized to access this page.');
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
}