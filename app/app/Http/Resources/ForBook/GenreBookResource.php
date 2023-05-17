<?php

namespace App\Http\Resources\ForBook;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $genre_name
 * @property mixed $id
 */
class GenreBookResource extends JsonResource
{
    public function toArray($request)
    {
        return array(
            'id' => $this->id,
            'genreName' => $this->genre_name,
        );
    }
}
