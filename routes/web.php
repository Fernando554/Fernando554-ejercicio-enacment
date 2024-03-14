<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\ResultController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/calcular', [CalculationController::class, 'calcularMultiplos']);
Route::post('/guardar', [CalculationController::class, 'guardarResultados']);