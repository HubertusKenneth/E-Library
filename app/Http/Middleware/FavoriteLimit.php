<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FavoriteLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            
            $max_favorites = 5; 

            $favorite_count = DB::table('favorites')
                ->where('user_id', auth()->id())
                ->count(); 
            
            Log::info('FavoriteLimit Check', [
                'count' => $favorite_count, 
                'user' => auth()->id()
            ]);

            if ($favorite_count >= $max_favorites) {
                Log::warning('FavoriteLimit Blocked Request: Limit Reached!'); 
                
                return back()->with('error', "You have reached your limit of {$max_favorites} favorited books. Please remove one to add another.");
            }
        }
        return $next($request);
    }
}
