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

Route::get('/register', [App\Http\Controllers\ImeiController::class, 'register'])->name('registro');
Route::post('/register', [App\Http\Controllers\ImeiController::class, 'store'])->name('user.store');

Route::get('/ingresar', [App\Http\Controllers\ImeiController::class, 'login'])->name('ingresar');
Route::post('/ingresar', [App\Http\Controllers\ImeiController::class, 'login'])->name('ingresar');

Route::get('/terminos-condiciones', [App\Http\Controllers\AppController::class, 'terms_conditions'])->name('terms_conditions');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:' . config('admin-auth.defaults.guard')])->group(function () {
	Route::get('/vervideo', [App\Http\Controllers\ImeiController::class, 'vervideo'])->name('codes.vervideo');
	Route::get('/vervideo/{id?}/', [App\Http\Controllers\ImeiController::class, 'video'])->name('codes.video');
});