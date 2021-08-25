<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'          => $this->id , 
            'liters'      => $this->liters , 
            'liter_price' => $this->liter_price , 
            'total_price' =>(int) $this->total_price  , 
            'total_price_word' => $this->total_price .' '. __('site.currency')  , 
            'status'      => $this->status , 
            'date'        => date('d/m/y , h.i A' , strtotime($this->created_at)) ,
            'user'        => [
                'id'   => $this->user_id ,
                'name' => $this->user->name ,
            ] , 
            'worker'        => [
                'id'   => $this->worker_id ,
                'name' => $this->worker->name ,
            ] , 
            'station'        => [
                'id'   => $this->station_id ,
                'name' => $this->station->name ,
            ] , 
            'fuel'        => [
                'id'   => $this->fuel_id ,
                'name' => $this->fuel->name ,
            ] , 
        ];
    }
}
