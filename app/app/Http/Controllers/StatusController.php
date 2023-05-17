<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Resources\StatusResource;
use App\Models\UserStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return StatusResource::collection(UserStatus::all());
    }

    public function store(StatusRequest $request)
    {
        $created_status = UserStatus::create($request->validated());
        return new StatusResource($created_status);
    }

    public function show(UserStatus $status)
    {
        return new StatusResource($status);
    }

    public function update(StatusRequest $request, UserStatus $status)
    {
        $status->update($request->validated());
        return new StatusResource($status);
    }

    public function destroy(UserStatus $status)
    {
        $status->delete();
        return response()->noContent();
    }
}
