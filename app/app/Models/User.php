<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'surname',
        'name',
        'email',
        'password',
        //'access_token',
        //'refresh_token',
        'image',
    ];

    protected $hidden = [
        'password',
        //'remember_token',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function owners_books()
    {
        return $this->hasMany(Book::class, 'owner_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function liked_books(){
        return $this->belongsToMany(Book::class, 'wishlist', 'user_id', 'book_id');
    }

    public function liked_review(){
        return $this->belongsToMany(Review::class, 'liked_reviews', 'user_id', 'review_id');
    }

    public function readers_books()
    {
        return $this->hasMany(Book::class, 'reader_id');
    }
}
