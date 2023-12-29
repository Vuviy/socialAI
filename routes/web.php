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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [\App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::get('/messaging', [\App\Http\Controllers\HomeController::class, 'messaging'])->name('messaging');
Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('/sign_in', [\App\Http\Controllers\HomeController::class, 'sign_in'])->name('sign_in');
Route::get('/sign_up', [\App\Http\Controllers\HomeController::class, 'sign_up'])->name('sign_up');
