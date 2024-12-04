<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable=[
        'ticket_number','user_id','subject','description','file','status','priority'
    ];

    public function getRouteKeyName()
    {
        return 'ticket_number';
    }

    /**
     * Things require during the boot
     */
    protected static function boot()
    {
        parent::boot();

        //Auto-adding uuid to newly created instances
        self::creating(function ($model) {
            $model->ticket_number = "SS-".rand(111111,999999);
        });
    }

    // accessors
    public function getLinkedModelAttribute(){
        return str_replace("App\Models\\",'',$this->ticketable_type);
    }

    // relation
    public function responses(){
        return $this->hasMany(SupportTicketResponse::class);
    }
    public function ticketable()
    {
        return $this->morphTo();
    }
}
