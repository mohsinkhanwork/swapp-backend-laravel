<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=[
        'blog_category_id',
        'admin_id',
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'summary',
        'content',
        'published',
        'published_at',
        'thumbnail',
        'reads'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime'
    ];
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }

    public function author(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

}
