<?php

use App\Http\Controllers\RolesController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/roles', [RolesController::class, 'index'])
    ->name('roles.index')
    ->middleware(AuthorizedMiddleware::class . ':Roles.showRoles');

Route::get('/roles/create', [RolesController::class, 'create'])
    ->name('roles.create')
    ->middleware(AuthorizedMiddleware::class . ':Roles.createRoles');

Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])
    ->name('roles.edit')
    ->middleware(AuthorizedMiddleware::class . ':Roles.updateRoles');

Route::post('/roles/store', [RolesController::class, 'store'])
    ->name('roles.store')
    ->middleware(AuthorizedMiddleware::class . ':Roles.createRoles');

Route::put('/roles/update', [RolesController::class, 'update'])
    ->name('roles.update')
    ->middleware(AuthorizedMiddleware::class . ':Roles.updateRoles');

Route::delete('/roles/delete/{id}', [RolesController::class, 'delete'])
    ->name('roles.delete')
    ->middleware(AuthorizedMiddleware::class . ':Roles.deleteRoles');