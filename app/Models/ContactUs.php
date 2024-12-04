<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable=[
        'query_number','name','email','message','ip_address','seen'
    ];

    /**
     * Things require during the boot
    */
    protected static function boot()
    {
        parent::boot();

        //Auto-adding uuid to newly created instances
        self::creating(function ($model) {
            $model->query_number = "SS-".rand(111111,999999);
        });
    }
}
