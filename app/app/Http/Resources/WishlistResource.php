<?php

namespace App\Http\Resources;

use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $book_id
 * @property int $user_id
 */
class WishlistResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'books' => BookResource::collection(User::all()->where('user_id', '=', $this->user_id)->liked_books),
        ];
    }
}
