<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function Question()
    {
        return $this->hasMany(Question::class);
    }

    public function Answer()
    {
        return $this->hasMany(Answer::class);
    }
}
