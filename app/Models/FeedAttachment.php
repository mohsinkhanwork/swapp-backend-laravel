<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedAttachment extends Model
{
    use HasFactory;
    protected $fillable=[
        'feed_id',
        'name',
        'type',
        'thumbnail',
        'size',
        'file'
    ];
}
