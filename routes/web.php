<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'prevent-back-history'], function() {
    Auth::routes();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'IndexController@index');
        Route::get('/cart', 'IndexController@index');
        Route::get('/products/{id}', 'IndexController@index');
        Route::get('/add-product', 'NewProductController@index');

        Route::get('api/search/{search}', 'ApiController@search');
        Route::get('api/cart', 'ApiController@cart');
        Route::get('api/products', 'ApiController@products');
        Route::get('api/products/{id}', 'ApiController@product');
        Route::post('api/cart/add', 'ApiController@addCartItem');
        Route::post('api/cart/remove', 'ApiController@removeCartItem');
    });
});
