<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class Save extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()    {
        return true;
    }

    public function rules()    {
        return [
            'title' => 'required|min:3|max:5',
            'content' => 'required|min:3|max:5',
        ];
    }

    public function attributes()    {
        return [
            'title' => 'Заголовок',
            'content' => 'Содержимое',
        ];
    }
}
