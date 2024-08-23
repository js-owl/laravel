<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment as ComStoreRequest;
use App\Models\Comment;

class Comments extends Controller{
    public function store(ComStoreRequest $request){
        $model = $request->checkCommentable();
        $model->comments()->save(Comment::make($request->only('text')));
        return redirect()->back();
    }
}
