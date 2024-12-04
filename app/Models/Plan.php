<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plan extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'type',
        'monthly_price_id',
        'monthly_price',
        'yearly_price_id',
        'yearly_price',
        'description',
        'monthly_swaps',
        'show_ads',
        'priority_support',
        'retry_exam_duration',
        'active'
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
    public function users(){
        return $this->hasMany(User::class);
    }
}
