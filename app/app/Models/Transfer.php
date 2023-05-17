<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'point_id',
//        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'user_transfers', 'transfer_id', 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function point()
    {
        return $this->belongsTo(PickUpPoint::class, 'point_id', 'id');
    }
}
