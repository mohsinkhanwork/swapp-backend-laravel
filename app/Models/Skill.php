<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'category_id',
        'title_en',
        'title_tr'
    ];

    // relations
    public function category(){
        return $this->belongsTo(SkillCategory::class);
    }

    public function questions(){
        if (App::getLocale()){
            return $this->hasMany(Question::class)->where('language', App::getLocale());
        }else{
            return $this->hasMany(Question::class)->where('language','en');
        }
    }

    public function quizTests()
    {
        return $this->hasMany(QuizTest::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('status')->withTimestamps();
    }

    // accessors
    public function getTitleAttribute(){
        $lang=app()->getLocale();
        return $lang=='tr'?$this->title_tr:$this->title_en;
    }
}
