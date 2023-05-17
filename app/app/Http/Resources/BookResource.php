<?php

namespace App\Http\Resources;

use App\Http\Resources\ForBook\AuthorBookResource;
use App\Http\Resources\ForBook\GenreBookResource;
use App\Http\Resources\ForBook\UserBookResource;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property double $rating
 * @property string $image
 * @property int $author_id
 * @property int $genre_id
 * @property int $owner_id
 * @property int $reader_id
 * @property mixed $liked_users
 */
class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'rating' => round($this->rating,2),
            'image' => $this->image != null ? asset(Storage::url($this->image)) : null,
            //'image' => asset( 'storage/books/' . $this->image),
            //'author' => AuthorResource::collection(Author::all()->firstWhere('id', '=', $this->author_id)),
            'author' => new AuthorBookResource(Author::all()->firstWhere('id', '=', $this->author_id)),
            //'genre' => GenreResource::collection(Genre::all()->firstWhere('id', '=', $this->genre_id)),
            'genre' => new GenreBookResource(Genre::all()->firstWhere('id', '=', $this->genre_id)),
            'owner' => new UserBookResource(User::all()->firstWhere('id', '=', $this->owner_id)),
            'reader' => new UserBookResource(User::all()->firstWhere('id', '=', $this->reader_id)),
            'likedUser' => $this->liked_users,
            'reviewsCount' => Review::all()->where('book_id', $this->id)->where('is_archived', false)->count()
        ];
    }
}
