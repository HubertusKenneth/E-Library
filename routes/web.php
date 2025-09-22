<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class,'show'])->name('books.show');


// Dashboard (Laravel Breeze default)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (Laravel Breeze default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Favorites (hanya untuk user login)
Route::middleware('auth')->group(function () {
    Route::post('/books/{book}/favorite', [FavoriteController::class,'toggle'])->name('books.favorite');
    Route::get('/favorites', [FavoriteController::class,'index'])->name('favorites.index');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function(){
    Route::resource('books', BookAdminController::class);
});

// Auth routes (Breeze)
require __DIR__.'/auth.php';
