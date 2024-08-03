<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:3|max:5',
            'content' => 'required|min:3|max:5',
        ]);
        // dd($validated);
        // $fields = $request->all('title', 'content');
        $post = Post::create($validated);
        return redirect("/posts/{$post->id}");
    }

    public function show(string $id){
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
