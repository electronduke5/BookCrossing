<?php

namespace App\Http\Requests;

use App\Rules\FIO;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'surname' => 'required|alpha|max:50',
            'name' => 'required|alpha|max:50',
            'email' => 'required|email:rfc,dns|unique:users',
            'image' => 'nullable',
        ];
    }
}
