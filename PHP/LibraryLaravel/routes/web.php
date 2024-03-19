<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Authors
Route::get('/authors', [AuthorsController::class, 'index']) ->name('authors.index');
Route::get('/authors/create', [AuthorsController::class, 'create']) ->name('authors.create');
Route::get('/authors/edit/{id}', [AuthorsController::class, 'edit']) ->name('authors.edit');

Route::post('/authors/store', [AuthorsController::class, 'store']) ->name('authors.store');
Route::put('/authors/update', [AuthorsController::class, 'update']) ->name('authors.update');
Route::delete('/authors/delete/{id}', [AuthorsController::class, 'delete']) ->name('authors.delete');

//Books
Route::get('/books', [BooksController::class,'index']) ->name('books.index');
Route::get('/books/create', [BooksController::class,'create']) ->name('books.create');
Route::get('/books/edit/{id}', [BooksController::class,'edit']) ->name('books.edit');

Route::post('/books/store', [BooksController::class,'store']) ->name('books.store');
Route::put('/books/update', [BooksController::class, 'update']) ->name('books.update');
Route::delete('/books/delete/{id}', [BooksController::class, 'delete']) ->name('books.delete');








