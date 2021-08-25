<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IMessage;
use App\Http\Requests\Api\Messages\sendMessageRequest;

class MessageController extends Controller
{
    use Responses ; 
    protected $message ;
    public function __construct(IMessage $message)
    {
        $this->message = $message ;
    }

    public function sendMessage(sendMessageRequest $request)
    {
        $this->message->store($request->validated() + (['user_id' => auth()->id()])) ; 
        $this->response('success' , __('apis.message_sent'));

    }
}
