<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Show dropdown list of genres
    public function index()
    {
        // Ambil semua genre unik dari tabel books
        $genres = Book::select('genre')
            ->distinct()
            ->orderBy('genre')
            ->pluck('genre');

        return view('categories.index', compact('genres'));
    }

    // Show books by selected genre
    public function show($genre)
    {
        // Decode genre (handle spaces encoded as %20 in URL)
        $decodedGenre = urldecode($genre);

        // Ambil semua buku dengan genre yang dipilih
        $books = Book::where('genre', $decodedGenre)->get();

        return view('categories.show', compact('decodedGenre', 'books'));
    }
}
