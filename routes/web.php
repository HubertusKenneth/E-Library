<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LogActivity;
use App\Http\Middleware\ThrottleReadings;
use App\Http\Middleware\FavoriteLimit;
use App\Http\Controllers\SessionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }

    Cookie::queue('locale', $locale, 60 * 24 * 365);

    return redirect()->back();
})->name('locale.switch');

Route::redirect('/home', '/');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show']) ->middleware(ThrottleReadings::class)->name('books.show');

Route::middleware('auth')->get('/books/{book}/pdf',
    [BookController::class, 'downloadPdf']
)->name('books.pdf');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/books/{book}/favorite', [FavoriteController::class, 'toggle'])->middleware(FavoriteLimit::class)->name('books.favorite');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('books', BookAdminController::class);

    Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
    Route::post('/users', [UserAdminController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserAdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/activity', [App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('activity.index');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{genre}', [CategoryController::class, 'show'])->name('categories.show');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware(LogActivity::class);
    
require __DIR__ . '/auth.php';
