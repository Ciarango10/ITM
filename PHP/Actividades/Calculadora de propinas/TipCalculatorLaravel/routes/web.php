<?php

use App\Http\Controllers\TipCalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tipcalculator', [TipCalculatorController::class, 'index']) ->name('tipcalculator.index');
Route::post('/tipcalculator/calculate', [TipCalculatorController::class, 'calculate'])->name('tipcalculator.calculate');

