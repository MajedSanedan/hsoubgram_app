<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class followController extends Controller
{
    public function follow(User $user)
    {
        if(auth()->id()== $user->id)
        {
            return redirect()->back()->with('error','Can not follow your self');
        }

        auth()->user()->follow($user);

        return redirect()->back()->with('status','Follow Request Send');
    }

    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);
         return redirect()->back()->with('status','unfolloed successfully');
    }
}
