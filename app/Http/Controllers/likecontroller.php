<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class likecontroller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        auth()->user()->likes()->toggle($post);

        return back();
    }
}
