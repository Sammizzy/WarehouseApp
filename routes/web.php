<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StockItemController::class, 'index']);
Route::resource('stock', StockItemController::class);
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('customers', CustomerController::class);



