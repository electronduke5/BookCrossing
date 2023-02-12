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
            'surname' => 'nullable|alpha|max:50',
            'name' => 'nullable|alpha|max:50',
            'email' => 'nullable|email:rfc,dns|unique:users',
            'image' => 'nullable',
        ];
    }
}
