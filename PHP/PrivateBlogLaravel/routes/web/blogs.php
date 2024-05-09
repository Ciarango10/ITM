<?php

use App\Http\Controllers\BlogsController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/blogs', [BlogsController::class, 'index'])
    ->name('blogs.index')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.showBlogs');

Route::get('/blogs/create', [BlogsController::class, 'create'])
    ->name('blogs.create')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.createBlogs');

Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit'])
    ->name('blogs.edit')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.updateBlogs');

Route::post('/blogs/store', [BlogsController::class, 'store'])
    ->name('blogs.store')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.createBlogs');

Route::put('/blogs/update', [BlogsController::class, 'update'])
    ->name('blogs.update')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.updateBlogs');

Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete'])
    ->name('blogs.delete')
    ->middleware(AuthorizedMiddleware::class . ':Blogs.deleteBlogs');