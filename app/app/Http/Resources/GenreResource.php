<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $genre_name
 * @property mixed $books
 */
class GenreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'genreName' => $this->genre_name,
            'books' => $this->books
        ];
    }
}
