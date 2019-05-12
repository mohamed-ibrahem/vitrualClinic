<?php

namespace App\Http\Resources;

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
            'gender' => $this->gender,
            'rating' => $this->ratingPercent(5),
            'description' => $this->info->get('description', ''),
            'country' => $this->country,
            'country_code' => $this->info->get('country'),
            'age' => $this->info->get('age'),
            'isOnline' => $this->isOnline(),
            'isDoctor' => $this->isDoctor(),
            'isMember' => $this->isMember(),
            $this->mergeWhen($this->isDoctor(), [
                'specialities' => $this->specialities
            ]),
            $this->mergeWhen(! $this->is($request->user()), [
                'canRate' => $this->userCanRateMe($request->user())
            ]),
            $this->mergeWhen($this->is($request->user()), [
                'notification' => $this->notifications,
                'messages' => ConversationResource::collection($this->conversations()),
                'profileCompletion' => $this->getProfileCompletionRate()
            ])
        ];
    }
}
