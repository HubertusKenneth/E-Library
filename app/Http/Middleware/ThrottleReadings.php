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
        $request->session()->flash('book_view_count', 'Unlimited'); 
        return $next($request);
        }

        $key = 'guest-book-views:' . $request->ip();
        $maxViews = 5; 

        $currentViews = RateLimiter::attempts($key);
        $projectedViews = $currentViews + 1; 

        if ($projectedViews > $maxViews) {

            RateLimiter::hit($key); 
            
            return back()->with([
                'throttle_error_message' => "You have viewed {$maxViews} books. Please log in to view more details.",
                'limit_reached' => true,
                'book_view_count' => $currentViews 
            ]);
        }
        
        RateLimiter::hit($key);
        
        $newViews = RateLimiter::attempts($key);
        $request->session()->flash('book_view_count', $newViews);
        return $next($request);
    }
}
