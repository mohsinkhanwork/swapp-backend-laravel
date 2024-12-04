<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'title_en',
        'title_tr',
    ];

    // relations
    public function skills(){
        return $this->hasMany(Skill::class,'category_id');
    }

    // accessors
    public function getTitleAttribute(){
        $lang=app()->getLocale();
        return $lang=='tr'?$this->title_tr:$this->title_en;
    }
}
