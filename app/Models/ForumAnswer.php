<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumAnswer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'user_id','question_id','detail','likes_count','best_answer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(ForumComment::class,'answer_id');
    }

    public function likes(){
        return $this->hasMany(AnswerLike::class,'answer_id');
    }
}
