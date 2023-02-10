<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikedReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'users' => UserController::class,
    'users/{$id}' => UserController::class,

    'genres' => GenreController::class,
    'genres/{$id}' => GenreController::class,

    'authors' => AuthorController::class,
    'authors/{$id}' => AuthorController::class,

    'books' => BookController::class,
    'books/{$id}' => BookController::class,

    'wishlist' => WishlistController::class,
    'like' => LikedReviewController::class,

    'reviews' => ReviewController::class,
    'reviews/{$id}' => ReviewController::class
]);
Route::post('login', [AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
