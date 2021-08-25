<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Models\UserToken;
use App\Models\UserUpdate;
use App\Repositories\Interfaces\IUser;
use App\Services\UserService;
use App\Traits\UploadTrait;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\Responses;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserRepository extends AbstractModelRepository implements IUser
{

    use   UploadTrait;
    use   Responses;
    
    private $userToken ;
    private $userUpdate ;

    public function __construct(User $model,UserToken $userToken ,UserUpdate $userUpdate)
    {
        parent::__construct($model);
        $this->userToken = $userToken ;
        $this->userUpdate = $userUpdate ;
    }

    // registration function 
    public function signUp($request){
        $user = $this->store($request+(['user_type' => 'user' ,'code' => 1111 , 'code_expire' => Carbon::now()->addMinute(5)])) ;
        if (isset($request->device_id))
            $this->updateDeviceId($user,$request);

        return $user ;
    }
    // resend activation code    
    public function updateCode($user){
        $user->update(['code' => 1111 , 'code_expire' => Carbon::now()->addMinute(5) , 'active' => 0]);
        return $user->code ;
    }
    // login function
    public function signIn($attributes = [])
    {
        $field = is_numeric($attributes['phone'])  ? 'phone' : 'email' ;

        if (auth()->guard()->attempt([ $field => $attributes['phone'], 'password' => $attributes['password'] ,'active' => 1])) {
            if (auth()->user()->block == 1 ){
                Auth::logout();
                return ['status' => 3 ];
            }
            return ['status' => 1 ];
        }else{
            if (auth()->guard()->attempt([ $field => $attributes['phone'], 'password' => $attributes['password']])){
                $user =  auth()->user()->update(['code' => 1111 , 'code_expire' => Carbon::now()->addMinute()]);
                Auth::logout();
                return ['status' => 2  , 'user_id' => $user->id] ;
            }
            return 0 ;
        }
    }

    // forget password 
    public function forgetPassword($phone){
        $user = $this->model->wherePhone($phone)->first();
        $this->userUpdate->updateOrCreate([
            'user_id' => $user->id , 
            'type'    => 'password', 
        ],[
            'code'    => 1111      ,  
        ]);
        return ['token' => JWTAuth ::fromUser($user)];
    }

    public function updateDeviceId($user,$request){
        $user->update([ 'device_id' => $request['device_id'] , 'token' => JWTAuth::fromUser($user) ]);
        $request['user_id']    = $user->id;
        $this->userToken ::updateOrcreate( [
            'device_id'   => $request['device_id'],
            'device_type' => $request->device_type,
            'user_id'     => $user->id,
        ] );
    }
    // check forget password code 
    public function CheckForgetPassCode($request)
    {
        $update = $this->userUpdate->where([
            'user_id'    => auth()->id(),
            'code'       => $request['code'],
            'type'       => 'password',
        ])->get();

        if ($update->count()  == 0 )
           return false ;

        auth()->user()->update(['password' => $request['password']]);
        $update->first()->delete();
        return true ;
    }
    // edit password
    public function editPassword($request){
        if (!\Hash::check($request['old_password'], auth()->user()->password))
            $this->response('fail', trans('auth.incorrect_pass'));

        auth()->user()->update(['password' => $request['password']]) ;
    }

    public function updatePhoneRequest($request)
    {
        $this->userUpdate->updateOrCreate([
            'user_id' => auth()->id() , 
            'type'    => 'phone', 
        ],[
            'key'     => $request['key']        ,  
            'phone'   => $request['phone']      ,  
            'code'    => 1111                   ,  
        ]);
        return ;
    }

    public function updatePhone($code)
    {
        $update = $this->userUpdate->where(['user_id' => auth()->id() , 'type' => 'phone' , 'code' => $code])->first();
        if ($update) {
            auth()->user()->update(['phone' => $update->phone , 'key' => $update->key]); 
            $update->delete();
            return 'done' ; 
        }
        return 'fail' ; 
    }
    
    
     public function block($client)
     {
         $client->block = 1 ;
         $client->save() ;
         return $client ;
     }
     public function deleteToken($user_id , $device_id)
     {
         $this->userToken ::where([
             'device_id'   => $device_id,
             'user_id'     => $user_id,
         ])->delete();
         return ;
     }

     public function chartData($type)
     {
         $users = $this->model->where('user_type' , $type)->select('id', 'created_at')
             ->get()
             ->groupBy(function($date) {
                 //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                 return Carbon::parse($date->created_at)->format('m'); // grouping by months
             });
         $usermcount = [];
         $userArr = [];

         foreach ($users as $key => $value) {
             $usermcount[(int)$key] = count($value);
         }

         for($i = 1; $i <= 12; $i++){
             if(!empty($usermcount[$i])){
                 $userArr[] = $usermcount[$i];
             }else{
                 $userArr[] = 0;
             }
         }
         return $userArr ;
     }
 }
