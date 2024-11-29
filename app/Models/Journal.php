<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'user_id',
        'plant_id',
        'title',
        'entry',
        'image',
        'mood',
        'location',
        'visibility',
    ];

    public function scopeVisible($query, $userId)
    {
        return $query->where(function ($query) use ($userId) {
            $query->where('visibility', 'public')
                  ->orWhere('user_id', $userId);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

}
