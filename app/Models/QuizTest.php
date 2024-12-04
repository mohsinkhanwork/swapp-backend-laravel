<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTest extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','skill_id','result','passed','total_questions','correct_answers'
    ];

    // relations
    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
