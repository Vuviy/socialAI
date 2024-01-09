<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request)
    {

        $data = $request->validate(['content' => 'required|min:3|max:255']);
        $user = auth()->user();

        $post = $user->posts()->create($data);

        return redirect()->back();
    }
}
