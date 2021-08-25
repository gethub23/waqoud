<?php

namespace App\Http\Controllers\Api\V1;
use JWTAuth;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IUser;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Interfaces\IWorker;
use App\Http\Resources\Api\WorkerResource;
use App\Http\Requests\Api\User\SignInRequest;
use App\Http\Requests\Api\updateEmailRequest ;
use App\Http\Requests\Api\User\ActivateRequest;
use App\Http\Requests\Api\User\StoreUpdateRequest;
use App\Http\Requests\Api\User\UserUpgradeRequest;
use App\Http\Requests\Api\User\ResetPasswordRequest;
use App\Http\Requests\Api\User\UpdateProviderReuest;
use App\Http\Requests\Api\User\ForgetPasswordRequest;
use App\Http\Requests\Api\Workers\WorkerSignInRequest;

class AuthController extends Controller
{
    use     Responses;

    private $userRepository;
    private $worker;

    public function __construct(IUser $userRepository , IWorker $worker)
    {
        $this->userRepository = $userRepository;
        $this->worker         = $worker;
    }
    // registration function
    public function signUp(StoreUpdateRequest $request)
    {
        $user   = $this->userRepository->signUp($request->validated());
        $token  = JWTAuth::fromUser($user);
        $user->update(['token' => $token]);
        $this->response('success', __('auth.registered') , ['token' => $token]);
    }

    // activate account function
    public function activate(ActivateRequest $request){
        if(Carbon::parse(auth()->user()->code_expire)->isPast())
            $this->response('fail', __('auth.code_expired'));


        if(auth()->user()->code == $request->code ){
            auth()->user()->update(['code' => null , 'code_expire' => null , 'active' => 1]);
            $this->response('success', __('auth.activated') , new UserResource(auth()->user()));
        }
        $this->response('fail', __('auth.code_invalid'));
    }

    // resend code 
    public function resendCode(){
        $code = $this->userRepository->updateCode(auth()->user());
        $this->response('success', __('auth.code_re_send'));
    }

    // login function
    public function signIn(SignInRequest $request){
        $token = JWTAuth::attempt(['phone' => $request['phone'], 'password' => $request['password']]);

        if(!$token)
            $this->response('fail', trans('auth.incorrect_pass_or_phone'));

        if(!auth()->user()->active){
            $code =  $this->userRepository->updateCode(auth()->user());
            $this->response('needActive' ,__('auth.not_active')  ,   ['token' => $token]);
        }
        
        if(auth()->user()->block){
            $this->response('block' ,__('auth.blocked'));
        }

        $this->userRepository->updateDeviceId(auth()->user(), $request);
        $this->response('sucsess',__('apis.signed') ,new UserResource(auth()->user()));
    }
    // worker login function
    public function WorkersignIn(WorkerSignInRequest $request){

        $token = auth('worker')->attempt(['phone' => $request['phone'], 'password' => $request['password'], 'key' => $request['key']]);
        if(!$token)
            $this->response('fail', trans('auth.incorrect_pass_or_phone'));

        $this->worker->updateDeviceId(auth('worker')->user(), $request);
        auth('worker')->user()->update(['token' => $token]);
        $this->response('sucsess',__('apis.signed') , new WorkerResource(auth('worker')->user()));
    }

    //  forget password 
    public function forgetPassword(ForgetPasswordRequest $request){
        $data  = $this->userRepository->forgetPassword($request->phone);
        $this->response('success' ,__('auth.code_re_send') , $data );
    }
    // reset password function
    public function resetPassword(ResetPasswordRequest $request){
        $status = $this->userRepository->CheckForgetPassCode($request->validated());
        if ($status) {
            $this->response('success' , __('apis.passwordReset') , new UserResource(auth()->user()) );
        }
        $this->response('fail' , __('auth.code_invalid'));
    }
    // logout
    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            $this->userRepository->deleteToken(auth()->id() , $request->device_id);
            JWTAuth::invalidate($token);
            return $this->sendResponse(null,trans('apis.loggedOut'));
        } catch (JWTException $e) {
            return $this->sendError(null,__('apis.something_wrong'));
        }
    }

    
    public function updateEmailRequest(updateEmailRequest $request)
    {
        $code =   $this->userRepository->updateEmailRequest($request->validated());
        return $this->sendResponse(['code' => $code],trans('apis.send_activated'));
    }

    public function updateEmail()
    {
        $this->userRepository->updateEmail();
        return $this->sendResponse(new UserResource(auth()->user()),trans('apis.email_changed'));
    }
}
