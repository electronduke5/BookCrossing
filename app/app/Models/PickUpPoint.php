<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUpPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'street',
        'house',
        'flat',
        'comment',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
