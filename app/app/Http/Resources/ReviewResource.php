<?php

namespace App\Http\Resources;

use App\Http\Resources\forReview\UserReviewResource;
use App\Models\Book;
use App\Models\LikedReview;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $book_id
 * @property int $user_id
 * @property mixed $liked_users
 * @property mixed $number_of_like
 * @property int $book_rating
 * @property mixed $created_at
 * @property mixed $is_archived
 */
class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'user' => new UserReviewResource(User::all()->firstWhere('id', '=', $this->user_id)),
            'book' => new BookResource(Book::all()->firstWhere('id', '=', $this->book_id)),
            'likedUser' => $this->liked_users,
            'dateCreated' => $this->created_at,
            'bookRating' => $this->book_rating,
            'likesCount' => LikedReview::all()->where('review_id', '=', $this->id)->count(),
            'isArchived' => $this->is_archived,
        ];
    }
}
