<?php

namespace App\Http\Controllers;

use App\Http\Requests\PickUpPointRequest;
use App\Http\Resources\PickUpPointResource;
use App\Models\PickUpPoint;
use Illuminate\Http\Request;

class PickUpPointController extends Controller
{
    public function index(Request $request)
    {
        $query = PickUpPoint::query();

        if ($user = $request->input('user')) {
            $query->where('user_id', "$user");
        }
        return PickUpPointResource::collection($query->get());
    }

    public function store(PickUpPointRequest $request)
    {
        $created_point = PickUpPoint::create($request->validated());
        return new PickUpPointResource($created_point);
    }

    public function show(PickUpPoint $pickUpPoint)
    {
        return new PickUpPointResource($pickUpPoint);
    }

    public function update(PickUpPointRequest $request, PickUpPoint $pickUpPoint)
    {
        $pickUpPoint->update($request->validated());
        return new PickUpPointResource($pickUpPoint);
    }

    public function destroy(PickUpPoint $pickUpPoint)
    {
        $pickUpPoint->delete();
        return response()->noContent();
    }
}
