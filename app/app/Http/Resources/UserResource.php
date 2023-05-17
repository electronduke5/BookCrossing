<?php

namespace App\Http\Resources;

use App\Models\Transfer;
use App\Models\UserStatus;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property mixed $owner_books
 * @property mixed $reader_books
 * @property mixed $reviews
 * @property mixed $liked_review
 * @property mixed $liked_books
 * @property mixed $remember_token
 * @property mixed $phone_number
 * @property mixed $status
 * @property mixed $requests
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phone_number,
            'status' => new StatusResource($this->status),
            'nextStatus' => new StatusResource(UserStatus::all()->firstWhere('id', '=', $this->status == null ? 1 : $this->status->id + 1)),
            'activeTransfersCount' => Transfer::all()->where('user_id', '=', $this->id)->where('is_active', '=', 1)->count(),
            'inactiveTransfersCount' => Transfer::all()->where('user_id', '=', $this->id)->where('is_active', '=', 0)->count(),
            //'password' => $this->password,
            'image' => $this->image != null ? asset(Storage::url($this->image)) : null,
            'ownerBooks' => BookResource::collection($this->owner_books),
            'readerBooks' => BookResource::collection($this->reader_books),
            'reviews' => $this->reviews,
            'likedReview' => $this->liked_review,
            'requests' => TransferForRequestsResource::collection($this->requests),
            'wishlist' => $this->liked_books,
        ];
    }
}
