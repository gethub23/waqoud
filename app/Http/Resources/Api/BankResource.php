<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
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
            'icon'           => $this->icon , 
            'name'           => $this->name , 
            'iban'           => $this->iban , 
            'account_number' => $this->account_number , 
            'account_name'   => $this->account_name , 
        ];
    }
}
