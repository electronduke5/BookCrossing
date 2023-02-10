<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'rating',
        'author_id',
        'genre_id',
        'owner_id',
        'reader_id'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function reader()
    {
        return $this->belongsTo(User::class, 'reader_id', 'id');
    }

    public function liked_users(){
        return $this->belongsToMany(User::class, 'wishlist', 'book_id', 'user_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
