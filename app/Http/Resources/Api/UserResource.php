<?php

namespace App\Http\Resources\Api;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;
class UserResource extends JsonResource
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
            'id'                               => (int)     $this->id,
            'name'                             => (string)  $this->name,
            'phone'                            => (string)  $this->phone,
            'key'                              => (double)  $this->key,
            'avatar'                           => (string)  $this->avatar,
            'block'                            => (boolean) $this->block,
            'active'                           => (boolean) $this->active,
            'lang'                             => (string)  $this->lang,
            'token'                            => (string)  $this->token,
            'birthdate'                        => (string)  $this->birthdate,
            'address'                          => (string)  $this->address,
            'latitude'                         => (string)  $this->latitude,
            'longitude'                        => (string)  $this->longitude,
            'gender'                           => (string)  $this->gender,
            'subscribed'                       => (string)  $this->subscribed,
            'subscribe_end'                    => (string)  $this->subscribe_end,
            'credit'                           => (string)  $this->wallet->charge,
            'is_notify'                        =>  $this->is_notify  == 1 ? true : false,
            'device_id'                        =>  $this->device_id,
        ];
    }
}
