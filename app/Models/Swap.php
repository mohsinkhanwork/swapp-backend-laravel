<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swap extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','proposal','response','status','reject_reason'
    ];

    // relations
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('skill_id','status','rating','review')->using(SwapUser::class);
    }
    public function swapUsers(){
        return $this->hasMany(SwapUser::class);
    }
    public function requester(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function chat(){
        return $this->hasOne(Chat::class);
    }
}
