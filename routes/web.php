<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;


Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', controller: BookController::class)
    ->only(['index', 'show']);

Route::get('books/{book}/reviews/create', [\App\Http\Controllers\ReviewController::class, 'create'])
    ->name('books.reviews.create');

Route::post('books/{book}/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])
    ->name('books.reviews.store');
