<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'user_id',
        'description',
        'privacy',
        'likes_count',
        'comments_count',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function attachments(){
        return $this->hasMany(FeedAttachment::class);
    }
    public function comments(){
        return $this->hasMany(FeedComment::class,'feed_id');
    }
    public function likes(){
        return $this->hasMany(FeedLike::class,'feed_id');
    }
}
