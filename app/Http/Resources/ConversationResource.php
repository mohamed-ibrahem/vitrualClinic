<?php

namespace App\Http\Resources;

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
            'hasNewMessage' => (bool) $this->messages->filter(function($message) use($request) {
                return ! $message->sender->is($request->user()) && ! $message->is_seen;
            })->count() > 0,
            'messages' => MessageResource::collection($this->messages),
            'with' => UserResource::make($request->user()->is($this->userOne) ? $this->userTwo : $this->userOne)
        ];
    }
}
