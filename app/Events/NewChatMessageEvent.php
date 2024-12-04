<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    private $room_id;
    public $data;
    public $sentByMe;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id,$room_id,$message)
    {
        $this->user_id=$user_id;
        $this->room_id=$room_id;
        $this->data=$message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('conversation-'.$this->user_id.'-'.$this->room_id),
            new PrivateChannel('conversation.'.$this->room_id)
        ];
    }
}
