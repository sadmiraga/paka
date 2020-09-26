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

//ajax routes
Route::get('getOblikasList', 'OrdersController@getOblikasList');
Route::get('getOkusList', 'OrdersController@getOkusList');
Route::get('getSteviloKosovList', 'OrdersController@getSteviloKosovList');


//ordering cake routes
Route::get('/', 'OrdersController@step1');
Route::post('/step2', 'OrdersController@step2');
Route::post('/step3', 'OrdersController@step3');
Route::post('/finish', 'OrdersController@finish');


//admin routes
Route::get('/orders', 'OrdersController@orders');
Route::get('/ship/{orderID}', 'OrdersController@completeOrder');

Route::get('/skupine', 'skupineController@skupine');
Route::get('/oblike', 'oblikeController@oblike');
Route::get('/okusi', 'okusiController@okusi');
Route::get('/prelivi', 'preliviController@preliviIndex');
Route::get('/dekori', 'okrasiController@okrasiIndex');

//ADMIN FORM ROUTES

//skupina routes
Route::post('/dodajSkupino', 'skupineController@addGroup');
Route::get('/urediSkupino/{skupinaID}', 'skupineController@editGroup');
Route::get('/izbrisiSkupino/{skupinaID}', 'skupineController@deleteGroup');
Route::post('/urediSkupinoExe', 'skupineController@editGroupExe');


//oblike routes
Route::post('/dodajObliko', 'oblikeController@addOblika');
Route::get('/urediObliko/{oblikaID}', 'oblikeController@editOblika');
Route::post('/urediOblikoExe', 'oblikeController@editOblikaExe');
Route::get('/izbrisiObliko/{oblikaID}', 'oblikeController@deleteOblika');

//okusi routes
Route::post('/dodajOkus', 'okusiController@addTaste');
Route::get('/urediOkus/{okusID}', 'okusiController@editTaste');
Route::post('/urediOkusExe', 'okusiController@editTasteExe');
Route::get('/izbrisiOkus/{okusID}', 'okusiController@deleteTaste');

//prelivi routes
Route::post('/dodajPreliv', 'preliviController@addPreliv');
Route::get('/urediPreliv/{prelivID}', 'preliviController@editPreliv');
Route::post('/urediPrelivExe', 'preliviController@editPrelivExe');
Route::get('/izbrisiPreliv/{prelivID}', 'preliviController@deletePreliv');

//okrasi routes
Route::post('/dodajOkras', 'okrasiController@dodajOkras');
Route::get('/urediOkras/{okrasID}', 'okrasiController@urediOkras');
Route::post('/urediOkrasExe', 'okrasiController@urediOkrasExe');
Route::get('/izbrisiOkras/{okrasID}', 'okrasiController@deleteOkras');


//parts routes
Route::get('/kosi', 'partsController@index');
Route::post('/dodajSteviloKosov', 'partsController@create');
Route::get('/urediKos/{partID}', 'partsController@editIndex');
Route::post('/urediSteviloKosov', 'partsController@editPartExe');
Route::get('/IzbrisiKos/{partID}', 'partsController@deletePart');


//default routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//route doesn't work for some weird reason
//Route::get('/admin', 'AdminController@index');
