<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->seen();

        return [
            'id' => $this->id,
            'message' => $this->message,
            'time' => $this->humans_time,
            'isSeen' => (bool) $this->is_seen,
            'sender' => $this->sender->getKey()
        ];
    }
}
