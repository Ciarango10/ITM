<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authors', [AuthorsController::class, 'index']) ->name('authors.index');
Route::get('/authors/create', [AuthorsController::class, 'create']) ->name('authors.create');
Route::get('/authors/edit/{id}', [AuthorsController::class, 'edit']) ->name('authors.edit');


Route::post('/authors/store', [AuthorsController::class, 'store']) ->name('authors.store');
Route::put('/authors/update', [AuthorsController::class, 'update']) ->name('authors.update');
Route::delete('/authors/delete/{id}', [AuthorsController::class, 'delete']) ->name('authors.delete');



