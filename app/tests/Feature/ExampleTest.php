<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->json('get', 'api/users')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    '*' => [
                        'id',
                        'surname',
                        'name',
                        'email',
                        'image',
                        'owners_books',
                        'readers_books' => [
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
                        'reviews' => [
                            '*' => [
                                'id',
                                'title',
                                'text',
                                'book_id',
                                'user_id',
                                'book_rating',
                                'is_archived',
                            ],
                        ],
                        'liked_review' => [
                            '*' => [
                                'id',
                                'title',
                                'text',
                                'book_id',
                                'user_id',
                                'book_rating',
                                'is_archived',
                                'pivot' => [
                                    'user_id',
                                    'review_id',
                                ]
                            ],
                        ],
                        'wishlist',
                    ]
                ]
            );
    }
}
