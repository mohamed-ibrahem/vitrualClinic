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
        return [
            'id' => $this->id,
            'type' => $this->type,
            'message' => $this->message,
            'images' => array_map(function($image) {
                return asset('storage/' . $image);
            }, $this->images),
            'time' => $this->humans_time,
            'isSeen' => (bool) $this->is_seen,
            'sender' => $this->sender->getKey()
        ];
    }
}
