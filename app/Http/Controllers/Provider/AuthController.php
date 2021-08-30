<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ICity;
use App\Repositories\Interfaces\ICountry;
use App\Repositories\Interfaces\IStation;
use App\Http\Requests\Provider\Auth\LoginRequest;
use App\Http\Requests\Provider\Auth\RegisterRequest;
use App\Http\Requests\Provider\Auth\resetPasswordRequest;
use App\Http\Requests\Provider\Auth\forgetPasswordRequest;

class AuthController extends Controller
{
    protected $country ;
    protected $city ;
    protected $station ;

    public function __construct(ICountry $country , ICity $city ,IStation $station)
    {
        $this->country  = $country ; 
        $this->city     = $city ; 
        $this->station  = $station ; 
    }

    public function loginPage()
    {
        $keys = $this->country->get();
        return view('provider.auth.login' , compact('keys'));
    }

    public function login(LoginRequest $request)
    {
        $remember = $request->remember == 1 ? true : false;
        if (auth()->guard('station')->attempt(['phone' => $request->phone,'key' => $request->key , 'password' => $request->password], $remember)){
            if (auth('station')->user()->active == 0) {
                $id = auth('station')->id() ;
                auth()->guard('station')->user()->update(['code' => rand(1111,9999)]);
                auth()->guard('station')->logout() ; 
                return response()->json(['status' => 'activate' ,'url' => url('/provider/confirm-phone/'.$id) , 'message' => awtTrans('الحساب غير مفعل برجاء ادخل كود التفعيل المرسل للجوال') ]);
            }
            return response()->json(['status' => 'login' ,'url' => url('/provider/dashboard') , 'message' => awtTrans('تم تسجيل الدخول بنجاح') ]);
        }else{
            if (auth()->guard('station')->attempt(['phone' => $request->phone, 'password' => $request->password], $remember)) {
                auth()->guard('station')->logout() ; 
                return response()->json(['status' => 0 ,'message' => awtTrans('تأكد من كود الدولة الخاص بك') ]);
            }
            return response()->json(['status' => 0 ,'message' => awtTrans('كلمة السر غير صحيحة') ]);
        }
    }  
    // register page
    public function registerPage()
    {
        $keys = $this->country->get();
        $cities = $this->city->get();
        return view('provider.auth.register' , compact('keys' , 'cities'));
    }

    public function register(RegisterRequest $request)
    {
        $station = $this->station->store($request->validated() + (['code' => rand(1111,9999)]));
        return response()->json(['message' => __('site.registerd') , 'url' => url('provider/confirm-phone/'.$station->id)]);
    }

    public function confirmPage($id)
    {
        return view('provider.auth.confirm' , compact('id'));
    }


    public function confirm(Request $request , $id)
    {
       $station = $this->station->findOrFail($id) ; 
       if ($request->code == $station->code) {
           $station->update([
                'code' => null  ,
                'active' => true  ,
           ]);
           return response()->json(['message' => __('site.user_activated') , 'url' => url('provider/login') , 'status' => 'success']);
        }else{
            return response()->json(['message' => __('site.check_code') , 'url' => url('provider/login') , 'status' => 'fail']);
        }
    }
    public function resendCode(Request $request , $id)
    {
        $station = $this->station->findOrFail($id) ;
        $station->update(['code' => rand(1111,9999)]) ;
        return response()->json(['message' => __('site.code_resended')]);
    }

    public function forgetPasswordPage()
    {
        $keys = $this->country->get();
        return view('provider.auth.forgrt_password' , compact('keys'));
    }
    public function forgetPassword(forgetPasswordRequest $request)
    {
        $station = $this->station->where(['key' => $request->key , 'phone' => $request->phone]);
        if ($station-> count() == 0 ) {
            return response()->json(['status' => 'fail' , 'message' => __('site.account_not_found')]);
        }else{
            $station->first()->update(['code' => rand(1111,9999)]);
            return response()->json(['status' => 'success' , 'message' => __('site.code_send') , 'url' => url('provider/reset-password/'.$station->first()->id)]);
        }
        return view('provider.auth.forgrt_password' , compact('keys'));
    }

    public function resetPasswordPage($id)
    {
        return view('provider.auth.reset_password' , compact('id'));
    }
    public function resetPassword(resetPasswordRequest $request , $id)
    {
        $station = $this->station->findOrFail($id) ; 
       if ($request->code == $station->code) {
           $station->update([
                'code' => null  ,
                'password' => $request->password  ,
           ]);
           return response()->json(['message' => __('site.passwordChanges') , 'url' => url('provider/login') , 'status' => 'success']);
        }else{
            return response()->json(['message' => __('site.check_code')  , 'status' => 'fail']);
        }
    }

    /**************** logout *****************/
     public function logout()
     {
         auth('station')->logout();
         session()->invalidate();
         session()->regenerateToken();
         return redirect(route('login'));
     }
}
