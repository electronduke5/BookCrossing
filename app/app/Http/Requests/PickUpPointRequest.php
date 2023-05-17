<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PickUpPointRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city' => 'required|max:100',
            'street' => 'nullable|max:100',
            'house' => 'nullable|max:4',
            'flat' => 'nullable|max:4',
            'comment' => 'nullable|max:255',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
}
