<?php

namespace App\Http\Requests;

use App\Rules\FIO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class UserStoreRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => ['required', 'max:25', Password::min(8)->mixedCase()->numbers()],
            'image' => 'nullable',
        ];
    }
}
