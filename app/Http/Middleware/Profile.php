<?php

namespace App\Http\Middleware;

use Closure;


class Profile
{

    public function handle($request, Closure $next)
    {
        if(auth()->user()){
            if($request->name == auth()->user()->name){
               return redirect('profile');
            }
        }
        return $next($request);
    }

}
