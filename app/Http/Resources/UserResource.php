<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getkey(),
            'name' => $this->name,
            'profile_pic' => $this->profile_pic,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->info->get('gender', 0) == 0 ? 'Male' : 'Female',
            'rating' => $this->ratingPercent(),
            'description' => $this->info->get('description', ''),
            'country' => $this->country,
            'isOnline' => $this->isOnline(),
            'isDoctor' => $this->isDoctor(),
            'isMember' => $this->isMember(),
            $this->mergeWhen($this->isDoctor(), [
                'specialities' => $this->specialities
            ]),
            $this->mergeWhen($this->is($request->user()), [
                'notification' => $this->notifications,
                'messages' => ConversationResource::collection($this->conversations())
            ])
        ];
    }
}
