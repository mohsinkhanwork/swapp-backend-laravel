<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable=[
        'advertiser_id',
        'package_id',
        'package_quantity',
        'price',
        'duration',
        'type',
        'title',
        'description',
        'content',
        'image',
        'features',
        'url',
        'button_text',
        'button_color',
        'button_bg_color',
        'color',
        'bg_color',
        'skill_category_id',
        'active',
        'status',
        'published_at',
        'impressions',
        'views',
        'ends_on',
        'transaction_id',
        'reject_reason',
        'total'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'ends_on'=>'datetime'
    ];

    // accessors
    public function getFeaturesAttribute($val){
        return $val?json_decode($val):array();
    }

    // relations
    public function package(){
        return $this->belongsTo(AdPackage::class,'package_id');
    }
    public function advertiser(){
        return $this->belongsTo(Advertiser::class);
    }
    public function skillCategory(){
        return $this->belongsTo(SkillCategory::class,'skill_category_id');
    }
    public function views(){
        return $this->hasMany(AdView::class);
    }
}
