<?php

use App\Http\Controllers\ChronometerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chronometer', [ChronometerController::class, 'index'])->name('chronometer.index');;
