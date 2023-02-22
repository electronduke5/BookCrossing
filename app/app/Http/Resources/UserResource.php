<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $image
 * @property mixed $owner_books
 * @property mixed $readers_books
 * @property mixed $reviews
 * @property mixed $liked_review
 * @property mixed $liked_books
 * @property mixed $remember_token
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
            //'password' => $this->password,
            'image' => $this->image,
            'owners_books' => $this->owner_books,
            'readers_books' => $this->readers_books,
            'reviews' => $this->reviews,
            'liked_review' => $this->liked_review,
            'wishlist' => $this->liked_books,
        ];
    }
}
