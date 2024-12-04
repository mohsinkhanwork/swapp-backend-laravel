<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'from_time',
        'end_time',
        'all_day',
        'location_type',
        'meeting_type',
        'location',
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }
}
