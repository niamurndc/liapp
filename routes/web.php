<?php

use App\Http\Controllers\OrderController;
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

Route::get('/', 'AdminPageController@showDashboard');

// Product route
Route::get('/product', 'AdminPageController@showProduct');
Route::get('/product/create', 'AdminPageController@createProduct');
Route::post('/product/create', 'ProductController@store');
Route::get('/product/delete/{id}', 'ProductController@destroy');
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/update/{id}', 'ProductController@update');

// category route
Route::get('/category', 'AdminPageController@showCategory');
Route::get('/category/delete/{id}', 'CategoryController@destroy');
Route::post('/category/create', 'CategoryController@store');

// Brand route
Route::get('/brand', 'AdminPageController@showBrand');
Route::get('/brand/delete/{id}', 'BrandController@destroy');
Route::post('/brand/create', 'BrandController@store');

// Order Route
Route::get('/order', 'OrderController@show');
Route::post('/order/create', 'OrderController@store');
Route::get('/order/view/{id}', 'OrderController@viewOrder');
Route::post('/order/edit/{id}', 'OrderController@update');
Route::get('/order/delete/{id}', 'OrderController@destroy');

// cart route
Route::get('/cart', 'CartController@index');
Route::post('/cart/create', 'CartController@store');
Route::post('/cart/update/{id}', 'CartController@update');
Route::get('/cart/delete/{id}', 'CartController@destroy');

// auth route
Auth::routes([
  'register' => false
]);

