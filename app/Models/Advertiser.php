<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;

class Advertiser extends Authenticatable
{
    use HasFactory, Billable, Notifiable;

          /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'enable_2fa',
        'email_verification_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // accessors
    public function getAvatarAttribute(){
        return $this->avatar??asset('assets/images/user.png');
    }

    // relations
    public function ads(){
        return $this->hasMany(Advertisement::class,'advertiser_id');
    }
    public function invoices(){
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
    public function supportTickets(){
        return $this->morphMany(SupportTicket::class, 'ticketable');
    }
}
