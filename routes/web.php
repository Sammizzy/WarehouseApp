<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StockItemController::class, 'index']);

//Route::resource('stock', StockItemController::class);
//Route::resource('customers', CustomerController::class);
//Route::resource('orders', OrderController::class);
//Route::resource('customers', CustomerController::class);


Route::get('/stock', [StockItemController::class, 'index'])->name('stock.index');
Route::get('/stock/create', [StockItemController::class, 'create'])->name('stock.create');
Route::post('/stock', [StockItemController::class, 'store'])->name('stock.store');
Route::get('/stock/{stock}', [StockItemController::class, 'show'])->name('stock.show');
Route::get('/stock/{stock}/edit', [StockItemController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{stock}', [StockItemController::class, 'update'])->name('stock.update');
Route::delete('/stock/{stock}', [StockItemController::class, 'destroy'])->name('stock.destroy');


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::get('/orders/most-ordered', [OrderController::class, 'mostOrdered'])->name('orders.most_ordered');

Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');


