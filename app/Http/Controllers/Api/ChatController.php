<?php

namespace App\Http\Controllers\Api;

use App\Models\Chat;
use App\Models\Swap;
use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Http\Controllers\ApiController;

class ChatController extends ApiController
{
    public function __construct(private ChatService $service) {}

    public function rooms()
    {
        return $this->service->rooms();
    }

    public function messages(Chat $room)
    {
        return $this->service->messages($room);
    }

    public function sendMessage(Request $request, Chat $room)
    {
        return $this->service->sendMessage($request, $room);
    }

    public function sendMessageBySwap(Request $request, Swap $swap)
    {
        return $this->service->sendMessageBySwap($request, $swap);
    }

    public function messagesBySwap(Swap $swap)
    {
        return $this->service->messagesBySwap($swap);
    }
}
