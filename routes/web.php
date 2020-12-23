<?php

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

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\AppController::class, 'home'])->name('home');

route::resource('codes', App\Http\Controllers\ImeiController::class);

Route::middleware(['guest:' . config('admin-auth.defaults.guard')])->group(function () {
	Route::get('/registro', [App\Http\Controllers\ImeiController::class, 'register'])->name('registro');
	Route::post('/registro', [App\Http\Controllers\ImeiController::class, 'store'])->name('user.store');
});

Route::get('/ingresar', [App\Http\Controllers\ImeiController::class, 'login'])->name('ingresar');
Route::post('/ingresar', [App\Http\Controllers\ImeiController::class, 'login'])->name('ingresar');

Route::get('/terminos-condiciones', [App\Http\Controllers\AppController::class, 'terms_conditions'])->name('terms_conditions');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:' . config('admin-auth.defaults.guard')])->group(function () {
	Route::get('/ruleta', [App\Http\Controllers\ImeiController::class, 'ruleta'])->name('codes.ruleta');

	Route::post('/winner', [App\Http\Controllers\ImeiController::class, 'storeWinner'])->name('store_winner');
});