<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'App\Http\Controllers\Dashboard@index')->name('dashboard');

Route::get('/wetenschapper' , 'App\Http\Controllers\Wetenschapper@index')->name('wetenschapper');

Route::get('/administratie' , 'App\Http\Controllers\Administratie@index')->name('administratie');