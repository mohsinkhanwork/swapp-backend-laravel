<?php

namespace App\Models;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender_id',
        'message',
        'parent_id',
        'read_by'
    ];

    // relations
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function attachment()
    {
        return $this->hasOne(ChatAttachment::class, 'message_id');
    }

    // accessor & mutators
    public function setReadByAttribute($val)
    {
        $read_by = $this->read_by;
        array_push($read_by, $val);
        $this->attributes['read_by'] = json_encode($read_by);
    }

    public function getLastMessageAttribute()
    {
        if ($this->attachment) {
            return $this->message != '' ? $this->message : $this->attachment->name;
        }
        return $this->message;
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
