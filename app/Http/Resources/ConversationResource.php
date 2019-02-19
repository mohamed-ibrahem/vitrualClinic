<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getKey(),
            'hasNewMessage' => (bool) $this->messages->filter(function($message) {
                return ! $message->sender->is(auth()->user()) && ! $message->is_seen;
            })->count() > 0,
            'messages' => MessageResource::collection($this->messages),
            'with' => UserResource::make(User::find(2))
        ];
    }
}
