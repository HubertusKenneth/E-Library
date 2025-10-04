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
        if (auth()->check()) {
            $totalFavorites = auth()->user()->favorites()->count();
        }

        return view('home', [
            'totalBooks' => Book::count(),

            'totalGenres' => Book::distinct('genre')->count('genre'),

            'totalUsers' => User::count(),
            'totalFavorites' => $totalFavorites,
        ]);
    }
}
