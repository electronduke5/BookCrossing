<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'rating' => 'sometimes|nullable',
            'author_id' => 'required|integer|exists:authors,id',
            'genre_id' => 'required|integer|exists:genres,id',
            'owner_id' => 'required|integer|exists:users,id',
            'reader_id' => 'sometimes|nullable|integer|exists:users,id',
        ];
    }
}
