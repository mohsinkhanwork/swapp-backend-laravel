<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'skill_id',
        'language',
        'text'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
