<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IWorker;
use App\Http\Resources\Api\NotificationsResource;

class WorkerController extends Controller
{
    use Responses ;
    protected $worker ;
    
    public function __construct(IWorker $worker )
    {
        $this->worker     = $worker;
    }

    public function notifications()
    {
        auth('worker')->user()->unreadNotifications->markAsRead();
        $this->response('success' , '' , NotificationsResource::collection(auth('worker')->user()->notifications)) ;
    }

    public function countNotifications()
    {
        $this->sendResponse(['count' => auth('worker')->user()->unreadNotifications->count()] , '');
    }

    public function deleteNotifications(Request $request)
    {
        auth('worker')->user()->notifications()->where('id', $request->id)->first()->delete();
        $this->sendResponse( '', __('site.notify_deleted'));
    }
}
