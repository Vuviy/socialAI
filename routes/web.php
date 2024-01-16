<?php

use App\Models\User;
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




//Route::get('/', function (){
//
//
//
//
//    return response()->json(['success' => 'хуйня', 'comment' => 'срфка'], 200, [], JSON_UNESCAPED_UNICODE);
//
//    dd(3);
////    dd(User::query()->inRandomOrder()->value('id'));
//
////    $users = User::query()->where('id', '>', 2)->get();
//
//    $ddd = \App\Models\Post::query()->with('comments.replies') ->find(51);
////    $chat_id = str_replace('chat-', '', $ddd);
//
//    dd($ddd->comments);
//});


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
});

Route::get('/user/{name}', [\App\Http\Controllers\HomeController::class, 'showUser'])->middleware('profile')->name('show.user');


Route::post('/follow', [\App\Http\Controllers\UserController::class, 'follow'])->name('follow');
Route::post('/send-message', [\App\Http\Controllers\UserController::class, 'sendMessage'])->name('send-message');
Route::post('/like', [\App\Http\Controllers\HomeController::class, 'like'])->name('like');
Route::post('/comment', [\App\Http\Controllers\HomeController::class, 'sendComment'])->name('comment');


Route::group([], function (){
    Route::post('/aiprototype-create', [\App\Http\Controllers\AIUserController::class, 'createProto'])->name('aiprototype.create');
});
//
