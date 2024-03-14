<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/calcular', [CalculationController::class, 'calcularMultiplos']);
Route::post('/guardar', [CalculationController::class, 'guardarResultados']);
