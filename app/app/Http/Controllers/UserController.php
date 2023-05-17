<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($fio = $request->input('search')) {
            $query->orWhere('surname', 'like', "%$fio%")
                ->orWhere('name', 'like', "%$fio%");
        }
        return UserResource::collection($query->get());
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request['password']);
        if ($request->hasFile('image') && $request->image != '') {
            $data['image'] = $request->file('image')->store('images/profiles', 'public');
        }
        $created_user = User::create($data);
        return new UserResource($created_user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = array_filter($request->validated());
        if ($request->hasFile('image') && $request->image != '') {
            $image_path = '/public/' . $user->image;
            if (Storage::fileExists($image_path)) {
                Storage::delete($image_path);
            }
            $data['image'] = $request->file('image')->store('images/profiles', 'public');
        }
        $user->update($data);
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }

    public function removeImage(User $user)
    {
        $image_path = '/public/' . $user->image;
        if (Storage::fileExists($image_path)) {
            Storage::delete($image_path);
        }
        $user->update(['image' => null]);
        return new UserResource($user);
    }
}
