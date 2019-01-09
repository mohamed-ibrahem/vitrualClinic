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
            'description' => $this->info->get('description', ''),
            'isOnline' => $this->isOnline(),
            'isDoctor' => $this->isDoctor(),
            'isMember' => $this->isMember(),
            $this->mergeWhen($this->isDoctor(), [
                'specialities' => $this->specialities
            ])
        ];
    }
}
