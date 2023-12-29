<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function settings(){
        return view('settings');
    }

    public function messaging(){
        return view('messaging');
    }

    public function profile(){
        return view('profile');
    }

    public function sign_in(){
        return view('sign_in');
    }

    public function register(UserRequest $request){

        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function sign_up(){
        return view('sign_up');
    }

    public function login(Request $request){

        $request->validate(['email' => 'required|email', 'password' => 'required']);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

}
