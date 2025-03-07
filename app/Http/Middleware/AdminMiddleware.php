<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (auth()->check() && auth()->user()->role_id === 1 && auth()->user()->is_verified) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
