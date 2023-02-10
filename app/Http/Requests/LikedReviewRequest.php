<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikedReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'review_id' => 'required|integer|exists:reviews,id',
        ];
    }
}
