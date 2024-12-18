<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class TreasurerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            
            return redirect()->route('login')->with('error', 'Unauthorized Access');
        }
        if (Auth::check() && Auth::user()->role === 'treasurer'){
            return $next($request);
            }
            return redirect()->back()->with('error', 'Access Denied: Only Treasurer can access this page.');

    }
}
