<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/home', '/');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/books/{book}/favorite', [FavoriteController::class, 'toggle'])->name('books.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('books', BookAdminController::class);

    Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
    Route::post('/users', [UserAdminController::class, 'store'])->name('users.store'); // ✅ route untuk tambah admin
    Route::delete('/users/{id}', [UserAdminController::class, 'destroy'])->name('users.destroy');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{genre}', [CategoryController::class, 'show'])->name('categories.show');

require __DIR__ . '/auth.php';
