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
            return back()->with('success','Removed from favorites');
        } else {
            $user->favorites()->attach($book->id);
            return back()->with('success','Added to favorites');
        }
    }

    public function index()
    {
        $books = auth()->user()->favorites()->paginate(9);
        return view('favorites.index', compact('books'));
    }
}
