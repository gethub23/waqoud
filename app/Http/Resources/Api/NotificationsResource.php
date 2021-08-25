<?php

namespace App\Http\Resources\Api;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->data['sender_type'] == 'worker') {
            $sender = Worker::find($this->data['sender']);
        }else{
            $sender = User::find($this->data['sender']);
        }
        return [
            'id'       => $this->id ,
            'title'    => $this->data['title_'.lang()] ,
            'message'  => $this->data['message_'.lang()] ,
            'type'     => $this->data['type'] ,
            'order_id' => isset($this->data['order_id'])  ?  $this->data['order_id']  : null,
            'date'     => date('d-m-y h:i A' , strtotime($this->created_at))  ,
            'read_at'  => $this->read_at != null ? date('d-m-y h:i A' , strtotime($this->read_at)) : null ,
            'sender'   => !$sender ? [
                'id'   => null ,
                'name'   => 'Administrative Notification' ,
                'avatar' => asset('storage/images/settings/logo.png') ,
            ] : [
                'id'     => $sender->id ,
                'name'   => $sender->name ,
                'avatar' => $sender->avatar ,
            ],
        ];
    }
}
