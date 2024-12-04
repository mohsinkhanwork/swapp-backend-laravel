<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCampaign extends Model
{
    use HasFactory;
    protected $fillable=[
        'admin_id','subject','body','users_reached'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
