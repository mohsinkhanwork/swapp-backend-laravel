<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Newsletter extends Model
{
    use HasFactory, Notifiable;
    protected $fillable=[
        'name','email','subscribed','email_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
