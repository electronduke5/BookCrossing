<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Resources\StatusResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $id
 */
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
        'phone_number',
        'status_id',
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

    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'status_id', 'id');
    }

    public function next_status()
    {
        return new StatusResource(UserStatus::all()->firstWhere('id', '=', $this->status_id + 1));
    }

    public function owner_books()
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

    public function requests(){
        return $this->belongsToMany(Transfer::class, 'user_transfers', 'user_id', 'transfer_id');
    }

//    public function requests(){
//        return $this->hasMany(UserTransfer::class, 'user_id');
//    }

    public function reader_books()
    {
        return $this->hasMany(Book::class, 'reader_id');
    }


}
