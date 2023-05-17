<?php

namespace App\Http\Resources\ForBook;

use App\Http\Resources\StatusResource;
use App\Models\Transfer;
use App\Models\UserStatus;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'email' => $this->email,
            //'password' => $this->password,
            'image' => $this->image != null ? asset(Storage::url($this->image)) : null,
            'phoneNumber' => $this->phone_number,
            'status' => new StatusResource($this->status),
            'nextStatus' => new StatusResource(UserStatus::all()->firstWhere('id', '=', $this->status == null ? 1 : $this->status->id + 1)),
            'activeTransfersCount' => Transfer::all()->where('user_id', '=', $this->id)->where('is_active', '=', 1)->count(),
            'inactiveTransfersCount' => Transfer::all()->where('user_id', '=', $this->id)->where('is_active', '=', 0)->count(),
            //'readers_books' => $this->readers_books,
        ];
    }
}
