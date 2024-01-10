<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Chat;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {


        $posts = Post::query()->latest()->get();
        return view('home', compact('posts'));
    }

    public function settings(){

        $user =  \auth()->user();

        return view('settings', compact('user'));
    }

    public function messaging(){


//        $chat = Chat::query()->first();





        $user =  \auth()->user();

//        dd($chat->oponent);



        return view('messaging', compact('user'));
    }

    public function profile(){
        $user =  \auth()->user();
        return view('profile', compact('user'));
    }

    public function showUser($name)
    {
        $user = User::query()->where('name', $name)->first();

        return view('user-profile', compact('user'));
    }

}
