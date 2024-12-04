<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('new-chat-{user_id}', function ($user, $user_id) {
    return (int) $user->uuid === (int) $user_id;
});

Broadcast::channel('conversation-{second_user}-{id}', function ($user, $id,$second_user) {
        return $user->chats()->where('uuid',$id)->count()>0;
});

Broadcast::channel('conversation.{chat_unique_id}', function ($user, $chatUniqueId) {
    return $user->chats()->where('uuid', $chatUniqueId)->count() > 0;
});