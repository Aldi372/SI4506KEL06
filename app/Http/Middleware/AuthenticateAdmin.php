<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has 'Admin' role
        if ($request->user() && $request->user()->role != 'admin') {
            // Redirect to home.index route if not an admin
            return redirect()->route('registration.index');
        }

        // Allow the request to proceed to the next middleware or route handler
        return $next($request);
    }
}
