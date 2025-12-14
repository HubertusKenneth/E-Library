<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter;

class ThrottleReadings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            return $next($request);
        }

        $key = 'guest-read-throttle:' . $request->ip();
        $maxAttempts = 5;
        $decayMinutes = 60; 

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            
            return response()->view('auth.login', [
                'message' => "You have exceeded the maximum of {$maxAttempts} book views per hour. Please log in to continue reading.",
                'seconds' => $seconds,
            ], 429);
        }

        RateLimiter::hit($key);
        return $next($request);
    }
}
