<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IComplaint;
use App\Http\Requests\Api\Complaints\StoreComplaintRequest;

class ComplaintController extends Controller
{
    use     Responses;

    private $complaint;

    public function __construct(IComplaint $complaint)
    {
        $this->complaint  = $complaint;
    }


    public function StoreComplaint(StoreComplaintRequest $Request)
    {
        if ($Request->type == 'user') {
            $this->complaint->store($Request->validated() + (['user_id' => auth()->id()])) ; 
        }else{
            $this->complaint->store($Request->validated() + (['worker_id' => auth('worker')->id()])) ; 
        }
        $this->response('success' , __('apis.complaint_send'));
    }
}
