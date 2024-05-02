<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;

Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit');

Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blogs.store');
Route::put('/blogs/update', [BlogsController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])->name('blogs.delete');