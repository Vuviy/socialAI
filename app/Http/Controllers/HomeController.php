<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function sign_up(){
        return view('sign_up');
    }

}
