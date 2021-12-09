<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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





Auth::routes();

//Route::get('/', 'App\Http\Controllers\LandingController@create');
Route::get('/', [App\Http\Controllers\landing::class, 'index']);
Route::get('/landing', [App\Http\Controllers\landing::class, 'index']);
Route::post('landings', 'App\Http\Controllers\landing@store');

Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::resource('peliculas', App\Http\Controllers\PeliculaController::class)->middleware('auth');
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class)->middleware('auth');
Route::resource('landings', App\Http\Controllers\LandingController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
