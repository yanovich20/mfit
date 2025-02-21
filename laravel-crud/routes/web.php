<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Displays the product create form
Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

// Endpoint for submitting a product create form
Route::post('/products/create', [ProductController::class, 'store'])
    ->name('products.create');

// Displays the product edit form
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])
    ->name('products.edit');

// Endpoint for submitting a product edit form
Route::post('/products/edit/{product}', [ProductController::class, 'update'])
    ->name('products.edit');

// Endpoint for submitting a product delete form
Route::post('/products/delete/{product}', [ProductController::class, 'destroy'])
    ->name('products.delete');

Route::get('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');


Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

// Displays the product create form
Route::get('/orders/create', [OrderController::class, 'create'])
    ->name('orders.create');

// Endpoint for submitting a product create form
Route::post('/orders/create', [OrderController::class, 'store'])
    ->name('orders.create');

// Displays the product edit form
Route::get('/orders/edit/{order}', [OrderController::class, 'edit'])
    ->name('orders.edit');

// Endpoint for submitting a product edit form
Route::post('/orders/edit/{order}', [OrderController::class, 'update'])
    ->name('orders.edit');

// Endpoint for submitting a product delete form
Route::post('/orders/delete/{order}', [OrderController::class, 'destroy'])
    ->name('orders.delete');

Route::get('/orders/show/{id}', [OrderController::class, 'show'])
    ->name('orders.show');
Route::post('/orders/change_status/{id}', [OrderController::class, 'change_status'])
    ->name('orders.change_status');