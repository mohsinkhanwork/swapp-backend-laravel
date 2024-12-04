<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class ForumQuestion extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'user_id','title','detail','privacy','views_count','active'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Things require during the boot
     */
    protected static function boot()
    {
        parent::boot();

        //Auto-adding uuid to newly created instances
        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    // relations
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function answers(){
        return $this->hasMany(ForumAnswer::class,'question_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
