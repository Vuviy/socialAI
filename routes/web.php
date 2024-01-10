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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function (){
    Route::get('/settings', [\App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
    Route::get('/messaging', [\App\Http\Controllers\HomeController::class, 'messaging'])->name('messaging');
    Route::get('/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
});


Route::group([], function (){
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'sign_in'])->name('sign_in');
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'sign_up'])->name('sign_up');

    Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

    Route::post('/edit_profile', [\App\Http\Controllers\UserController::class, 'edit_profile'])->name('edit_profile');
});

Route::group([], function (){
    Route::post('/post-create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
//    Route::get('/sign_up', [\App\Http\Controllers\UserController::class, 'sign_up'])->name('sign_up');
//
//    Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
//    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
//    Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
//
//    Route::post('/edit_profile', [\App\Http\Controllers\UserController::class, 'edit_profile'])->name('edit_profile');
});

Route::get('/user/{name}', [\App\Http\Controllers\HomeController::class, 'showUser'])->middleware('profile')->name('show.user');


Route::post('/follow', [\App\Http\Controllers\UserController::class, 'follow'])->name('follow');
