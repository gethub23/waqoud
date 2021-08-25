<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
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
            'id'            => $this->id , 
            'name'          => $this->name , 
            'avatar'        => $this->avatar , 
            'phone'         => $this->phone , 
            'identity'      => $this->identity , 
            'salary'        => $this->salary , 
            'city_id'       => $this->city_id , 
            'city'          => $this->city->name , 
            'station'       => $this->station->name , 
            'station_id'    => $this->station_id , 
            'token'         => $this->token,
        ];
    }
}
