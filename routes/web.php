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
Route::middleware(['auth'])->namespace('App\Http\Controllers')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/',function(){
        return view('dashboard.home');
    })->name('home');
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');

});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('/category/{category}', [App\Http\Controllers\HomeController::class, 'productsByCategory'])->name('products.category');
