<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketResponse extends Model
{
    use HasFactory;

    protected $fillable=[
        'support_ticket_id','sender_type','file','description','admin_id'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
