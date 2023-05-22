<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Catalogue\Product::class, 'index']); // render product list
Route::get('/order', [App\Http\Controllers\Sales\Order::class, 'placeOrder']); // render view order for confirm
Route::get('/confirm-order', [App\Http\Controllers\Sales\Order::class, 'saveOrder']); // save order and show thanks messge
Route::post('/cart', [App\Http\Controllers\Cart\CartController::class, 'addProducts']); // route for add products via JS
Route::delete('/cart', [App\Http\Controllers\Cart\CartController::class, 'deleteProductFromCart']);  // route for delete products via JS
Route::get('/cart', [App\Http\Controllers\Cart\CartController::class, 'getAllProductsCart']); // route for get all products cart and render in aside

