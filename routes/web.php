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

Route::get('/scientist', "App\Http\Controllers\Scientist@index")->name('scientist');

Route::get('/administratie' , 'App\Http\Controllers\Administratie@index')->name('administratie');

Route::get('/aboutus', 'App\Http\Controllers\AboutUs@index')->name('aboutus');

Route::post('/customer', 'App\Http\Controllers\Customer@store')->name('customer.store');