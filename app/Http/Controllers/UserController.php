<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\UserRequest;
use App\Models\Follower;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

        $user->profile()->create([]);


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

    public function follow(Request $request)
    {
        $user = \auth()->user();
        $data = ['success' => true];
        $subs = $user->subscriptions()->pluck('id')->toArray();

            if(in_array($request->follow_id, $subs)){
                Follower::query()->where('follow_id', $request->follow_id)->where('user_id', $user->id)->delete();
                $data['action'] = 'unfollow';
                return response()->json($data, 200);

            }

        $follow = Follower::create(['user_id' => $user->id, 'follow_id' => $request->follow_id]);

        if($follow){
            return response()->json($data, 201);
        }
        return response()->json(['success' => false], 400);

    }


    public function sendMessage(Request $request)
    {

        $user = User::query()->where('id', $request->user_id)->first();

        if($user == \auth()->user())
        {
            $chat_id = str_replace('chat-', '', $request->chat_id);

            if(strlen($chat_id) == 0){
                return response()->json(['success' => false, 'message' => 'chat not exist']);
            }
            $content = htmlspecialchars($request->message);
            $message = Message::create(['user_id' => $user->id, 'chat_id' => $chat_id, 'content' => $content]);
            if($message){
                $message->chat()->touch();
            }

            return response()->json(['success' => true, 'message' => $message->content, 'time' =>\Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans()]);
        }


        return response()->json(['success' => false, 'message' => 'error']);
    }



}
