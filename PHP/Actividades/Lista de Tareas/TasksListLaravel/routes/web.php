<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', [TasksController::class, 'index']) ->name('tasks.index');
Route::get('/tasks/create', [TasksController::class, 'create']) ->name('tasks.create');
Route::get('/tasks/edit/{id}', [TasksController::class, 'edit']) ->name('tasks.edit');

Route::post('/tasks/store', [TasksController::class, 'store']) ->name('tasks.store');
Route::put('/tasks/update', [TasksController::class, 'update']) ->name('tasks.update');
Route::delete('/tasks/delete/{id}', [TasksController::class, 'delete']) ->name('tasks.delete');
