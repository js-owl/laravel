<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class Posts extends Controller
{
    public function __construct(){
        $this->authorizeResource(Post::class);
    }

    public function index(){
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(SaveRequest $request){
        $post = Post::make($request->validated());
        $post->user_id = auth()->id(); // id текущего пользователя
        $post->save();
        return redirect("/posts/{$post->id}");
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(SaveRequest $request, Post $post){
        $post->update($request->validated());
        return redirect()->route('posts.show', [$post->id]);
    }

    // public function destroy($id)
    // {
    //     //
    // }
}
