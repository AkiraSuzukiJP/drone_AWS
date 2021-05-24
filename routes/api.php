<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function () {
    //機体
    Route::get('aircrafts', 'AircraftController@index');
    Route::post('aircrafts', 'AircraftController@store');
    Route::get('aircrafts/{aircrafts}', 'AircraftController@show');
    //Route::post('aircrafts/{aircrafts}', 'AircraftController@update');
    //Route::delete('aircrafts', 'AircraftController@destroy');
    //Route::get('aircrafts/selector', 'AircraftController@selector');
});