<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NotesController::class, 'index']) ->name('notes.index');
Route::get('/notes/create', [NotesController::class, 'create']) ->name('notes.create');
Route::get('/notes/edit/{id}', [NotesController::class, 'edit']) ->name('notes.edit');

Route::post('/notes/store', [NotesController::class, 'store']) ->name('notes.store');
Route::put('/notes/update', [NotesController::class, 'update']) ->name('notes.update');
Route::delete('/notes/delete/{id}', [NotesController::class, 'delete']) ->name('notes.delete');
