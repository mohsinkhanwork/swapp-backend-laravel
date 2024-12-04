<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Setting extends Model
{
    use HasFactory;

    protected $fillable=[
        'key','value','value_type'
    ];

    public function setKeyAttribute($value){
        $this->attributes['key'] = Str::slug(strtolower($value));
    }
}
