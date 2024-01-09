<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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


    public function edit_profile(ProfileEditRequest $request){

        $data = $request->all();
        $user = \auth()->user();
        $file = '';

        if($request->hasFile('photo')){
            $file = $request->photo->store('images');
            $data['photo'] = $file;

            if($user->profile->photo !== null){
                Storage::delete($user->profile->photo);
            }
        }

        $user_data = [];

        $request->validated();

        if(\auth()->user()->name !== $request->name){
            $user_data['name'] = $request->name;
        }
        if(\auth()->user()->email !== $request->email){
            $user_data['email'] = $request->email;
        }
        if(!empty($user_data)){
            $user->update($user_data);
        }

        unset($data['_token']);
        unset($data['name']);
        unset($data['email']);

        $user->profile()->update($data);


        return redirect()->back();





    }
}
