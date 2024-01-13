<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Chat;
use App\Models\Like;
use App\Models\Message;
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

    public function messaging(Request $request){


        $user =  \auth()->user();
        $messageTo = '';
        if($request->get('user')){

            $chats = $user->chats();

            $chatsArr = [];
            foreach ($chats as $chat){
                $chatsArr[] = $chat->user_id;
                $chatsArr[] = $chat->oponent_id;
            }
            if(!in_array($request->get('user'), $chatsArr)){
                $chat = Chat::create(['user_id' => $user->id, 'oponent_id' => $request->get('user')]);
    //            $messageTo = User::query()->where('id', $request->get('user'))->first();
            }
        }

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

    public function like(Request $request)
    {

        if(!$request->post_id)
        {
            return response()->json(['success' => false, 'message' => 'Post not exist']);
        }


//        $user = User::query()->where('id', $request->user_id)->first();
        $user = \auth()->user();

        if($user)
        {
            $like = Like::query()->where('user_id', $user->id)->where('post_id', $request->post_id)->first();
            if($like)
            {
                $like->delete();
                $likes = Post::query()->find($request->post_id)->likes->count();
                return response()->json(['success' => true, 'likes' => $likes]);
            }
            $user->likes()->create(['post_id' => $request->post_id]);

            $likes = Post::query()->find($request->post_id)->likes->count();
            return response()->json(['success' => true, 'likes' => $likes]);
        }


        return response()->json(['success' => false, 'message' => 'Your not login']);

    }

}
