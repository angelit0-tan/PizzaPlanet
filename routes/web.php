<?php

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CustomPizzaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('{pizza}/make-your-own', [CustomPizzaController::class, 'index']);
Route::get('{pizza}/checkout', [CheckOutController::class, 'index']);
