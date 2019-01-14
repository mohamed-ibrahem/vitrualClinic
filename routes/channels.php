<?php

Broadcast::channel('conversation-{conversation}', function (\App\User $user, \App\Conversation $conversation) {
    return ($user->is($conversation->userOne) || $user->is($conversation->userTwo));
});

Broadcast::channel('message-{message}-seen', function (\App\User $user, \App\Message $message) {
    return true;
});
