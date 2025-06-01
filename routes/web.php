<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('products.index');});
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class)->except(['edit', 'update', 'destroy']);
Route::post('orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
