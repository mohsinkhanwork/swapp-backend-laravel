<?php

namespace App\Models;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SwapUser extends Pivot
{
    use HasFactory;
    protected $table ='swap_user';
    protected $fillable = [
       'swap_id',
       'skill_id',
        'user_id',
       'status',
    ];

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}