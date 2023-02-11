<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'book_id',
        'user_id',
        'book_rating',
        'is_archived',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function liked_users()
    {
        return $this->belongsToMany(User::class, 'liked_reviews', 'review_id', 'user_id');
    }

    public function number_of_like(){
        return LikedReview::all()->where('id', '=', $this->id)->count();
    }

    public function isLiked(User $user){
        return LikedReview::all()->firstWhere('id', '=', $this->id);
    }
}
