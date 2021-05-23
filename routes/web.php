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

Auth::routes();


Route::resource("aircrafts", "AircraftController");
Route::resource("pilots", "PilotController");
Route::resource("inspectors", "InspectorController");
Route::resource("inspection_rrecords", "InspectionRrecordController");
Route::resource("flight_records", "FlightRecordController");

Route::get('/{any}', function () {
    Route::auth();
    return view('layouts.app');
})->where('any', '.*')->middleware('auth');
