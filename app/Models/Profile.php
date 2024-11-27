<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'location',
        'hobbies',
        'favorite_books',
        'favorite_movies',
        'favorite_music',
        'country',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}