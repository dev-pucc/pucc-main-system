<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RecruitementOfficerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is an recruitement officer
        if (Auth::check() && Auth::user()->role == 'recruitement officer') {
            return $next($request); // Allow access if the user is an recruitement officer
        }

        // If not an recruitement officer, redirect to the back
        return back()->with('error', 'You do not have recruitement officer access');

    }
}
