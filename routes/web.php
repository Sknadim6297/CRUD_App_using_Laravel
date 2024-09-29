<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('add-product', [ProductController::class, 'AddProduct'])->name('add-product');

Route::post('store-product', [ProductController::class, 'StoreProduct'])->name('store-product');
Route::get('delete-product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete-product');
Route::get('edit-product/{id}', [ProductController::class, 'EditProduct'])->name('edit-product');
Route::put('update-product/{id}', [ProductController::class, 'UpdateProduct'])->name('update-product');