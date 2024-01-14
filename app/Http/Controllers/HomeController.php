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



    public function sendComment(Request $request)
    {
        if(!$request->post_id)
        {
            return response()->json(['success' => false, 'message' => 'Post not exist']);
        }


//        $user = User::query()->where('id', $request->user_id)->first();
        $user = \auth()->user();
        $post = Post::query()->find($request->post_id);

        if(!$post)
        {
            return response()->json(['success' => false, 'message' => 'Post not exist']);
        }

        if($user)
        {

            $comment = $post->comments()->create(['user_id' => $user->id, 'text' => e($request->text)]);

            $com =
                  '<li class="comment-item">
                    <div class="d-flex position-relative">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs">
                            <a href="'. route('show.user', ['name' => $comment->user->name]).'"><img class="avatar-img rounded-circle" src="'. asset('storage/'.$comment->user->profile->photo).'" alt=""></a>
                        </div>
                        <div class="ms-2">
                            <!-- Comment by -->
                            <div class="bg-light rounded-start-top-0 p-3 rounded">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1"> <a href="'.route('show.user', ['name' => $comment->user->name]).'"> '.$comment->user->name.' </a></h6>
                                    <small class="ms-2">'.\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans().'</small>
                                </div>
                                <p class="small mb-0">'.   nl2br($comment->text).'</p>
                            </div>
                            <!-- Comment react -->
                            <ul class="nav nav-divider py-2 small">
                                <li class="nav-item">
                                    <button class="nav-link" data-reply-id="'.$comment->id.'"> Reply</button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>';



            return response()->json(['success' => true, 'comment' => $com]);
        }


        return response()->json(['success' => false, 'message' => 'Your not login']);

    }

}
