<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\Save as SaveRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class Posts extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(SaveRequest $request){
        $post = Post::create($request->validated());
        return redirect("/posts/{$post->id}");
    }

    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(SaveRequest $request, $id){
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.show', [$post->id]);
    }

    // public function destroy($id)
    // {
    //     //
    // }
}
