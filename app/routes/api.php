<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LikedReviewController;
use App\Http\Controllers\PickUpPointController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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
    'reviews/{$id}' => ReviewController::class,

    'statuses' => StatusController::class,
    'statuses/{$id}' => StatusController::class,

    'transfers' => TransferController::class,
    'transfers/{$id}' => TransferController::class,

    'points' => PickUpPointController::class,
    'points/{$id}' => PickUpPointController::class,
]);
Route::post('login', [AuthController::class, 'login']);
Route::post('reviews/archive/{review}', [ReviewController::class, 'archive']);
Route::post('reviews/unzip/{review}', [ReviewController::class, 'unzip']);
Route::post('users/removeImage/{user}', [UserController::class, 'removeImage']);
Route::post('users/removeImage/{user}', [UserController::class, 'removeImage']);
Route::post('transfers/makeRequest', [TransferController::class, 'makeRequest']);
Route::post('transfers/makeTransfer', [TransferController::class, 'makeTransfer']);
Route::get('books/forTransfer/{user}', [BookController::class, 'getUserBooksForTransfer']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
