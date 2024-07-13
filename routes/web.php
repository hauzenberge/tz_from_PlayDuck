<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/book/{id}', [BookController::class, 'show']);
    Route::post('/book/{id}/review', [ReviewController::class, 'store'])->middleware('auth');
    Route::get('/books/create', [BookController::class, 'create'])->name('book-create');
    Route::post('/book/add', [BookController::class, 'store'])->name('books.store');
});

Route::get('/books', [BookController::class, 'getBooks']);

require __DIR__ . '/auth.php';
