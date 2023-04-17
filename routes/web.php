<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/login', 'App\Http\Controllers\Login@index');

Route::post('/login', 'App\Http\Controllers\Login@login')->name('login');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/search', [Dashboard::class, 'search'])->name('dashboard.search');
    Route::get('/{id}', [Dashboard::class, 'getStationById']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/scientist', "App\Http\Controllers\Scientist@index")->name('scientist');
Route::get('/wetenschapper', 'App\Http\Controllers\Wetenschapper@index')->name('wetenschapper');
Route::get('/wetenschapper/vergelijk', 'App\Http\Controllers\Wetenschapper@compare')
    ->name('vergelijkstations')
    ->middleware(['auth', 'verified', 'role:admin']);
Route::post('/wetenschapper/vergelijk', [\App\Http\Controllers\Wetenschapper::class, 'compareTwo'])
    ->name('vergelijk2')
    ->middleware(['auth', 'verified', 'role:admin']);

Route::get('/administratie' , 'App\Http\Controllers\Administratie@index')->name('administratie');

Route::get('/aboutus', 'App\Http\Controllers\AboutUs@index')->name('aboutus');

Route::post('/customer', 'App\Http\Controllers\Customer@store')->name('customer.store');
Route::get('/administratie', 'App\Http\Controllers\Administratie@index')->name('administratie');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', \App\Http\Controllers\UserController::class)
    ->only(['index', 'edit', 'update', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'verified', 'role:admin']);


Route::resource('customers', \App\Http\Controllers\CustomerController::class)
    ->only(['index', 'create'])
    ->middleware(['auth', 'verified', 'role:customer_service',]);
//
//Route::resource('scientists', \App\Http\Controllers\Wetenschapper::class)
//    ->only(['index', 'compare'])
//    ->middleware(['auth', 'verified', 'role:admin']);
//
//Route::get('scientists/compare', [\App\Http\Controllers\Wetenschapper::class, 'compare'])
//    ->middleware(['auth', 'verified', 'role:admin']);


require __DIR__ . '/auth.php';
