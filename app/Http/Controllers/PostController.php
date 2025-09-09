<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        $suggestedUsers= auth()->user()->suggested_users();
        return view('posts.index',compact('posts','suggestedUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required'],
            'image' => ['required', 'mimes:jped,jpg,png,gif']
        ]);

        $image = $request['image']->store('posts', 'public');
        $data['image'] = $image;
        $data['slug'] = Str::random(10);
        $data['user_id'] = Auth::user()->id;
        $data['description'] = $request['description'];

        Post::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'description' => ['required'],
            'image' => ['mimes:jped,jpg,png,gif']
        ]);

        if($request->has('image'))
        {
            $image= $request->file('image')->store('posts','public');
            $data['image']= $image;
        }

        $post->update($data);

        return back()->with('success','updatetd successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image)
        {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('welcome');
    }
}
