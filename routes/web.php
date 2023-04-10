<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use const App\Http\Controllers\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\Login@index');

Route::post('/login', 'App\Http\Controllers\Login@login')->name('login');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/search', [Dashboard::class, 'search'])->name('dashboard.search');
    Route::get('/{id}', [Dashboard::class, 'getStationById']);
});

Route::get('/wetenschapper' , 'App\Http\Controllers\Wetenschapper@index')->name('wetenschapper');

Route::get('/administratie' , 'App\Http\Controllers\Administratie@index')->name('administratie');