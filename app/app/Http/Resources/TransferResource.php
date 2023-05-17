<?php

namespace App\Http\Resources;

use App\Http\Resources\forReview\UserReviewResource;
use App\Models\Book;
use App\Models\PickUpPoint;
use App\Models\User;
use App\Models\UserTransfer;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $user_id
 * @property mixed $book_id
 * @property mixed $point_id
 * @property mixed $created_at
 * @property mixed $recipients
 * @property mixed $is_active
 */
class TransferResource extends JsonResource
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
            'isActive' => $this->is_active,
            'dateCreated' => $this->created_at,
            'user' => new UserReviewResource(User::all()->firstWhere('id', '=', $this->user_id)),
            'book' => new BookResource(Book::all()->firstWhere('id', '=', $this->book_id)),
            'point' => new PickUpPointResource(PickUpPoint::all()->firstWhere('id', '=', $this->point_id)),
            'recipients' => UserReviewResource::collection($this->recipients->unique()),
        ];
    }
}
