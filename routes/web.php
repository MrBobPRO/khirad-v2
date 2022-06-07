<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/contacts', 'contacts')->name('contacts');
    Route::get('/faq', 'faq')->name('faq');

    Route::get('/search', 'search')->name('search');
});

Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
    Route::get('/world-most-readable', 'worldMostReadable')->name('world-most-readable');
    Route::get('/top-books', 'topBooks')->name('top-books');
    Route::get('/{slug}', 'show')->name('show');
});

Route::controller(BookController::class)->name('books.')->group(function () {
    Route::get('/all-books', 'index')->name('index');
    Route::get('/books/{slug}', 'show')->name('show');

    Route::get('/read-book', 'read')->name('read');
});

Route::controller(AuthorController::class)->prefix('authors')->name('authors.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show');
});

require __DIR__.'/auth.php';
