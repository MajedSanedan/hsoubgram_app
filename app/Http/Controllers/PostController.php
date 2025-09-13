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
        $Ids= auth()->user()->following()->wherePivot('confirmed',true)->pluck('users.id')->push(Auth::id());
        $posts=Post::whereIn('user_id',$Ids)->latest()->get();
        $users= User::whereIn('id',$Ids)->latest()->get();
        $suggestedUsers= auth()->user()->suggested_users();
        return view('posts.index',compact('posts','suggestedUsers','users'));
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
        $this->authorize('update',$post);
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

        return redirect()->route('user_profile',$post->owner->username)->with('success','updatetd successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        if($post->image)
        {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('user_profile',$post->owner->username);
    }

    public function explore()
    {
        $posts=Post::whereRelation('owner','prvate_account',0)->whereNot('user_id',auth()->id())->simplePaginate(9);

        return view('posts.explore',compact('posts'));
    }
}
