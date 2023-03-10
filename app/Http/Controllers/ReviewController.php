<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {

        $query = Review::query()->where('is_archived', '=', false)->orderByDesc('created_at');
        if($is_archived = $request->input('archive')){
            $query = Review::query()->where('is_archived', $is_archived)->orderByDesc('created_at');
        }
        if ($sort = $request->input('sort')) {
            $query->orderBy($sort);
        }
        if ($user_id = $request->input('user')) {
            $query->where('user_id', '=', $user_id);
        }
        if ($book_id = $request->input('book')) {
            $query->where('book_id', '=', $book_id);
        }
        return ReviewResource::collection($query->get());
    }

    public function archive(Review $review)
    {
        $review->update(['is_archived' => 1]);
        return new ReviewResource($review);
    }

    public function unzip(Review $review)
    {
        $review->update(['is_archived' => 0]);
        return new ReviewResource($review);
    }

    public function store(ReviewRequest $request)
    {
        $created_review = Review::create($request->validated());
        $created_review->is_archived = 0;
        $book_id = $request->book_id;
        //Получение Review, где id книги = id только что созданной книги
        $reviews = Review::all()->where('book_id', $book_id);
        $average = 0;

        if (count($reviews) > 0) {
            //Высчитываем среднее значение рейтинга
            $average = $reviews->sum('book_rating') / count($reviews);
        }
        //обновления рейтинга книги
        $book = Book::all()->firstWhere('id', $book_id)->update(array('rating' => round($average, 2)));
        return new ReviewResource($created_review);
    }

    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());
        return new ReviewResource($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->noContent();
    }
}
