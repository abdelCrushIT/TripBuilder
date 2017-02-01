<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/airports', 'AirportController@getAll');
Route::get('/trips', 'TripController@getAll');
Route::get('/trips/{id}', 'TripController@get');
Route::post('/trips/addFlight/', 'TripController@addFlight');
Route::post('/trips/deleteFlight/', 'TripController@deleteFlight');
