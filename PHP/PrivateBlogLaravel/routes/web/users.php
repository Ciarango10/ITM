<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/Users', [UsersController::class, 'index'])
     ->name('users.index')
     ->middleware(AuthorizedMiddleware::class . ':Usuarios.showUsers');

Route::get('/users/create', [UsersController::class, 'create'])
     ->name('users.create')
     ->middleware(AuthorizedMiddleware::class . ':Usuarios.createUsers');

Route::get('/users/edit/{id}', [UsersController::class, 'edit'])
     ->name('users.edit')
     ->middleware(AuthorizedMiddleware::class . ':Usuarios.updateUsers');

Route::post('/users/store', [UsersController::class, 'store'])
     ->name('users.store')
     ->middleware(AuthorizedMiddleware::class . ':Usuarios.createUsers');

Route::put('/users/update', [UsersController::class, 'update'])
     ->name('users.update')
     ->middleware(AuthorizedMiddleware::class . ':Usuarios.updateUsers');
