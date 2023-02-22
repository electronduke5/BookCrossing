<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'genre_name' => 'required|unique:genres'
        ];
    }

    public function messages()
    {
        return [
            'genre_name.required' => 'Это обязательное поле',
            'genre_name.unique' => 'Такой жанр уже существует',

        ];
    }
}
