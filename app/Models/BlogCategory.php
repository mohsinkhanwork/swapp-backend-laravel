<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','slug'
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function parentCategory(){
        return $this->belongsTo(Self::class,'parent_id','id');
    }
}
