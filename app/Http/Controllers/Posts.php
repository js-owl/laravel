<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class Posts extends Controller
{
    public function index()
    {
        $posts = [['id'=>1], ['id'=>2]];
        return view('posts.index', ['posts' => $posts, 'some' => 100]);
    }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }

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
