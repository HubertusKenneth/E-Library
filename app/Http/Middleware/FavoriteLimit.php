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
            $user = auth()->user();
            $max_favorites = 5;

            $book = $request->route('book');

            if (!$book || !isset($book->id)) {
                return $next($request);
            }

            $is_already_favorited = $user->favorites()->where('book_id', $book->id)->exists();

            if ($is_already_favorited) {
                Log::info('FavoriteLimit: Unfavorite action detected (already favorited), skipping limit check.', ['user' => $user->id, 'book_id' => $book->id]);
                return $next($request);
            }

            $favorite_count = $user->favorites()->count();
            
            if ($favorite_count >= $max_favorites) {
                Log::warning('FavoriteLimit Blocked Request: Limit Reached!');
                
                return back()->with(    'favorite_limit_error',__('popup.favorite_limit.message', ['max' => $max_favorites]));
            }
        }
        return $next($request);
    }
}
