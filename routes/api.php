<?php

use App\Http\Controllers\Api\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/postWheatherData', 'App\Http\Controllers\WheatherDataController@index');

Route::post('/iwa/login', [AuthenticationController::class, 'login']);
Route::post('/iwa/register', [AuthenticationController::class, 'register']);

Route::group([
    'prefix' => '/iwa',
    'middleware' => ['auth:sanctum'],
    ], function () {

    Route::group(['prefix' => '/abonnement'], function () {

        Route::get('/{id}', 'App\Http\Controllers\WheatherDataController@retrieveWeatherData');
        Route::get('/stations', 'App\Http\Controllers\StationController@ListStations');
        Route::get('/station/{naam}', 'App\Http\Controllers\StationController@getStationByName');
    });

    Route::group(['prefix' => '/contracten'], function () {

        Route::get('/query/{nr}', 'App\Http\Controllers\CustomerController@getQuery');
        Route::get('/stations', 'App\Http\Controllers\StationController@ListStations');
        Route::get('/station/{naam}', 'App\Http\Controllers\StationController@getStationByName');
    });
});
