<?php

namespace Tests\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;

class GenreControllerTest extends TestCase
{
    public function testIndexReturnsDataInValidFormat()
    {

        $this->json('get', 'http://127.0.0.1:8888/api/genres')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'genreName',
                        'books' => [
                            '*' => [
                                'id',
                                'title',
                                'description',
                                'image',
                                'rating',
                                'author_id',
                                'owner_id',
                                'reader_id',
                                'genre_id',

                            ],
                        ],
                    ]
                ]
            );
    }
}
