<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Chat;
use App\Models\Like;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class HomeController extends Controller
{
    public function index()
    {


//        $url = 'https://api.openai.com/v1/chat/completions';
//        $client = new Client(['base_uri' => $url]);
//
//
//        $headers = ["Content-Type" => "application/json", "Authorization" => "Bearer ". env('API_KEY_OPEN_AI') ];
//        $body = ["model" => "babbage-002",
//                "messages" => [
//                      "role" => "system",
//                      "content" => "You are a poetic assistant, skilled in explaining complex programming concepts with creative flair."
//                  ]
//        ];
//        $request = new GuzzleRequest('POST', $url, $headers, json_encode($body));
//
//        // Create a client with a base URI
//
//        $promise = $client->send($request);
//
//
//        dd($promise);



        $posts = Post::query()->with('comments.parentComment')->latest()->get();
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

            $comment = $post->comments()->create(['user_id' => $user->id, 'text' => e($request->text), 'reply_id' => $request->reply_id]);

            $replyBlock = '';
            if($request->reply_id){

                $replyBlock = '
                        <div class="bg-light rounded-start-top-0 p-3 rounded mb-1">
                                <small>reply to:</small>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <small class="mb-1"> <a href="'. route('show.user', ['name' => $comment->parentComment->user->name]).'"> '.$comment->parentComment->user->name.' </a></small>
                                    <small class="ms-2">'.\Carbon\Carbon::createFromTimeStamp(strtotime($comment->parentComment->created_at))->diffForHumans().'</small>
                                </div>
                                <p class="small mb-0">'.  substr(nl2br($comment->parentComment->text), 0, 35).'...' .'</p>
                            </div>';
                  };
            $com =
                  '<li class="comment-item">
                    <div class="d-flex position-relative">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs">
                            <a href="'. route('show.user', ['name' => $comment->user->name]).'"><img class="avatar-img rounded-circle" src="'. asset('storage/'.$comment->user->profile->photo).'" alt=""></a>
                        </div>
                        <div class="ms-2 w-100 mb-3">
                        '.
                  $replyBlock
                  .'
                            <!-- Comment by -->
                            <div class="bg-light rounded-start-top-0 p-3 rounded">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1"> <a href="'.route('show.user', ['name' => $comment->user->name]).'"> '.$comment->user->name.' </a></h6>
                                    <small class="ms-2">'.\Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans().'</small>
                                </div>
                                <p class="small mb-0">'.   nl2br($comment->text).'</p>
                            </div>
                            <!-- Comment react -->
                           <ul class="nav nav-divider py-2 small"">
                                <li class="nav-item">
                                    <button class="nav-link reply-btn" data-id="'.$post->id.'" data-reply-id="'.$comment->id.'"> Reply</button>
                                </li>

                                <div data-id="'.$comment->id.'" class=" w-100 position-relative d-none reply-block">
                                    <textarea data-id="'.$comment->id.'" data-autoresize class="form-control pe-5 bg-light comment-body-reply" rows="1" placeholder="Add a comment..."></textarea>
                                    <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0 send-comment-reply" data-id="'.$post->id.'" data-reply-id="'.$comment->id.'" type="submit">
                                        <i class="bi bi-arrow-up-circle-fill"></i>
                                    </button>
                                </div>
                            </ul>
                        </div>
                    </div>
                </li>';

//            <ul class="nav nav-divider py-2 small">
//                                <li class="nav-item">
//                                    <button class="nav-link" data-reply-id="'.$comment->id.'"> Reply</button>
//                                </li>
//                            </ul>

            return response()->json(['success' => true, 'comment' => $com], 200, [], JSON_UNESCAPED_UNICODE);
        }


        return response()->json(['success' => false, 'message' => 'Your not login']);

    }

}
