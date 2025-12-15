<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalFavorites = 0;
        $booksRead = 0;

        if (auth()->check()) {
            $totalFavorites = auth()->user()->favorites()->count();

            if (auth()->user()->role === 'user') {
                $booksRead = auth()->user()->readBooks()->count();
            }
        }

        return view('home', [
            'totalBooks' => Book::count(),
            'totalGenres' => Book::distinct('genre')->count('genre'),
            'totalUsers' => User::count(),
            'totalFavorites' => $totalFavorites,
            'booksRead' => $booksRead,
        ]);
    }

}
