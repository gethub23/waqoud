<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Http\Resources\Api\UserResource;
use App\Http\Resources\NotificationsResource;
use App\Http\Requests\Api\User\EditProfileRequest;
use App\Http\Requests\Api\User\updatePhoneRequest;
use App\Http\Requests\Api\User\EditPasswordRequest;

class UserController extends Controller
{
    use     Responses;

    private $Repo;
    private $rateRepo;

    public function __construct(IUser $Repo)
    {
        $this->Repo          =   $Repo;
    }

    // profile 
    public function profile(){
        $this->response('successs' , '' , new UserResource(auth()->user()));
    }
    // update profile function
    public function updateProfile(EditProfileRequest $request){
        $this->Repo->update(auth()->user() , $request->validated() );
        $this->response('success' , __('apis.updated') , new UserResource(auth()->user()) );
    }
    // update password 
    public function editPassword(EditPasswordRequest $request){
        $this->Repo->editPassword($request->validated());
        $this->response('success' , __('apis.updated') ,new UserResource(auth()->user()));
    }
    // update phone request send code
    public function updatePhoneRequest(updatePhoneRequest $request)
    {
        $code =   $this->Repo->updatePhoneRequest($request->validated());
        return $this->response('success' , trans('apis.send_activated'));
    }
    // update phone 
    public function updatePhone(Request $request)
    {
        $status = $this->Repo->updatePhone($request->code);
        if ($status == 'done') {
            $this->response('success' , __('auth.phone_changed') , new UserResource(auth()->user()) );
        }
        $this->response('fail' , __('auth.code_invalid'));
    }




    public function changeNotifyStatue()
    {
        $user = auth()->user() ; 
        $user->update(['is_notify' => $user->is_notify == 1 ? 0 : 1 ]);
        $msg = $user->is_notify ? __('apis.openNotify') : __('apis.closeNotify') ;
        $this->sendResponse(['status' => $user->is_notify] , $msg);
    }

    public function notifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return NotificationsResource::collection(auth()->user()->notifications) ;
    }

    public function countNotifications()
    {
        $this->sendResponse(['count' => auth()->user()->unreadNotifications->count()] , '');
    }

    public function deleteNotifications(Request $request)
    {
        auth()->user()->notifications()->where('id', $request->id)->first()->delete();
        $this->sendResponse( '', __('site.notify_deleted'));
    }

    public function userData($id)
    {
        $this->response('success' , '' , new UserResource($this->Repo->findOrFail($id)));
    }

}
