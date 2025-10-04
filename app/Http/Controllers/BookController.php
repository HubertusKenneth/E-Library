<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $q = $request->input('q');

        $books = Book::when($q, function($query, $q) {
            $query->where('title', 'like', "%{$q}%")
                  ->orWhere('author', 'like', "%{$q}%")
                  ->orWhere('genre', 'like', "%{$q}%")
                  ->orWhere('publisher', 'like', "%{$q}%");
        })->paginate(9);

        return view('books.index', compact('books', 'q'));
    }


    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function toggleFavorite(Book $book)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Please login to add this book to favorites!');
        }

        if ($user->favorites->contains($book->id)) {
            $user->favorites()->detach($book->id); 
        } else {
            $user->favorites()->attach($book->id);
        }

        return redirect()->back();
    }

    public function favorites()
    {
        $books = Auth::user()->favorites()->paginate(9);
        return view('books.favorites', compact('books'));
    }

    public function create() {}
    public function store(Request $request) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
