<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedComment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','feed_id','detail'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function feed(){
        return $this->belongsTo(Feed::class);
    }
}
