<?php

use Illuminate\Support\Facades\Auth;
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


//ordering cake routes
Route::get('/', 'OrdersController@step1');
Route::post('/step2', 'OrdersController@step2');
Route::post('/step3', 'OrdersController@step3');
Route::post('/finish', 'OrdersController@finish');


//admin routes
Route::get('/orders', 'OrdersController@orders');
Route::get('/ship/{orderID}', 'OrdersController@completeOrder');




//default routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
