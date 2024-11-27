<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'type', 
        'care_instructions', 
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    // public function reminders()
    // {
    //     return $this->hasMany(Reminder::class);
    // }

}
