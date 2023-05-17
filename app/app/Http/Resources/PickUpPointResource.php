<?php

namespace App\Http\Resources;

use App\Http\Resources\forReview\UserReviewResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PickUpPointResource extends JsonResource
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
            'city'=> $this->city,
            'street' => $this->street,
            'house' => $this->house,
            'flat' => $this->flat,
            'comment' => $this->comment,
            'user' => new UserReviewResource(User::all()->firstWhere('id', '=', $this->user_id)),
        ];
    }
}
