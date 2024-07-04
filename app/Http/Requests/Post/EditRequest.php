<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:1000',
        ];
    }
}
