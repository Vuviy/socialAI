<?php

namespace App\Http\Controllers;

use App\Http\Requests\AIUserPrototypeRequest;
use App\Models\AIUserPrototype;
use Illuminate\Http\Request;

class AIUserController extends Controller
{
    public function createProto(AIUserPrototypeRequest $request)
    {
//        dd($request->validated());

       $aiproto = auth()->user()->aiUsers()->create($request->validated());

       if($aiproto){
           $request->session()->flash('status', 'AIUser created successful!');
           return redirect()->back();
       }
    }
}
