<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Comment extends FormRequest
{
    public function authorize()    {
        return true;
    }

    public function rules()    {
        return [
            'text' => 'required|min:3|max:5',
        ];
    }

    public function attributes(){
        return [
            'text' => 'Содержимое',
        ];
    }

    public function checkCommentable()    {
        $commentables = config('commentable');
        if(!isset($commentables[$this->model])){
            Log::alert('danger');
            throw ValidationException::withMessages([
                'model' => 'wrong model'
            ]);
        }
        $model = $commentables[$this->model]::findOrFail($this->id);
        return $model;
    }
}
