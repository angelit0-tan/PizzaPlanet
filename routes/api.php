<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('{pizza}/payment', [PaymentController::class, 'processPayment']);