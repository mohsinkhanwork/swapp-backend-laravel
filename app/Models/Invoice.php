<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number','transaction_id','billed_at', 'amount', 'currency','invoiceable_id', 'invoiceable_type'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'billed_at' => 'datetime'
    ];

    public function invoiceable()
    {
        return $this->morphTo();
    }

    public function getLinkedModelAttribute(){
        return str_replace("App\Models\\",'',$this->invoiceable_type);
    }
}
