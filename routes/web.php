<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController; 
Route::get('/', fn() => view('home'))->name('home'); 
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); 
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
Route::get('/products/filter', [ProductController::class, 'filterForm'])->name('products.filter.form'); 
Route::get('/products/filter/results', [ProductController::class, 'filterResults'])->name('products.filter.results'); 
Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage'); 
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); 
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');