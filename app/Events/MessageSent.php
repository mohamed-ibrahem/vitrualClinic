<?php

namespace App\Events;

use App\Conversation;
use App\Http\Resources\MessageResource;
use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $conversation;
    public $message;

    /**
     * @param Conversation $conversation
     * @param Message $message
     */
    public function __construct(Conversation $conversation, Message $message)
    {
        $this->conversation = $conversation->getKey();
        $this->message = MessageResource::make($message);
    }

    /**
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('conversation-' . $this->conversation);
    }
}
