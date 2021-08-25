<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
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
            'id'        => $this->id , 
            'avatar'    => $this->avatar , 
            'name'      => $this->name , 
            'phone'     => $this->phone , 
            'latitude'  => $this->latitude , 
            'longitude' => $this->longitude , 
            'city'      => $this->city->name , 
        ];
    }
}
