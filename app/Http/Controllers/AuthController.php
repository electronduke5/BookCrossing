<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = User::where('email', '=', $request->email)->first();
        if ($user == null)
            return response(
                ['message' => 'Неверный email'],
                401
            );


        if (Hash::check($request->password, $user->password)) {
            return new UserResource($user);
        } else return response([
            'message' => 'Неверный пароль'
        ], 401);
    }
}
