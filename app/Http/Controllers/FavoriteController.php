<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function toggle(Book $book)
{
    $user = auth()->user();

    if ($user->favorites()->where('book_id', $book->id)->exists()) {
        $user->favorites()->detach($book->id);

        return back()->with('alert', [
            'type' => 'remove',
            'message' => __('book_removed_from_favorites')
        ]);
    } else {
        $user->favorites()->attach($book->id);

        return back()->with('alert', [
            'type' => 'add',
            'message' => __('book_added_to_favorites')
        ]);
    }
}



    public function index()
    {
        $user = auth()->user();
        
        $favoriteCount = $user->favorites()->count(); 
        
        $maxFavorites = 5; 

        $books = $user->favorites()->paginate(9);
        
        return view('favorites.index', compact('books', 'favoriteCount', 'maxFavorites'));
    }
}
