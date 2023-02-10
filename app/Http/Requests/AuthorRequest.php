<?php

namespace App\Http\Requests;

use App\Rules\FIO;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'surname' => 'required|max:50|alpha',
            'name' => 'required|max:50|alpha',
            'patronymic' => 'required|max:50|alpha',
        ];
    }
}
