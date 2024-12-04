<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Chat extends Model
{
    use HasFactory;
    protected $fillable=[
        'swap_id'
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
    public function swap(){
        return $this->belongsTo(Swap::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function messages(){
        return $this->hasMany(ChatMessage::class);
    }
    public function lastMessage(){
        return $this->hasOne(ChatMessage::class)->latestOfMany();
    }
}
