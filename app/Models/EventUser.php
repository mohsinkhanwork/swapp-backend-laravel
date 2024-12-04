<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id'
    ];

     // Since this is a pivot table, you might want to disable timestamps
     public $timestamps = false;

    /**
     * Get the event that owns the EventUser.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the EventUser.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
