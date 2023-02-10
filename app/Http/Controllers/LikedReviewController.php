<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikedReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\LikedReview;
use App\Models\Review;
use Illuminate\Http\Request;

class LikedReviewController extends Controller
{
//    public function index()
//    {
//
//    }

    public function store(LikedReviewRequest $request)
    {
        $review = Review::all()->firstWhere('id', $request->review_id);
        $old_like = LikedReview::where('user_id', $request->user_id)->where('review_id', $request->review_id)->first();
        if ($old_like) {
            $old_like->delete();
            return new ReviewResource($review);
        }
        $liked_review = LikedReview::create($request->validated());
        return new ReviewResource($review);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//
//    public function destroy($id)
//    {
//        //
//    }
}
