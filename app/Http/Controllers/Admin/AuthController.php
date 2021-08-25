<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\loginRequest ;
class AuthController extends Controller
{
    /***************** change lang  *****************/
    public function SetLanguage($lang)
    {
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }

//        dd(session( 'lang' ));
        return back();
    }

    /***************** show login form *****************/
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**************** show login form *****************/
    public function login(loginRequest $request)
    {
        $remember = $request->remember == 1 ? true : false;
        if (auth()->guard()->attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            if (auth()->user()->user_type == 'user'){
                auth()->logout();
                return response()->json(['status' => 0  , 'message' => awtTrans('تأكد من صحه البياانات') ]);
            }
            return response()->json(['status' => 'login' ,'url' => url('/admin/dashboard') , 'message' => awtTrans('تم تسجيل الدخول بنجاح') ]);
        }else{
            return response()->json(['status' => 0 ,'message' => awtTrans('كلمة السر غير صحيحة') ]);
        }
    }

    /**************** logout *****************/
    public function logout()
    {
        auth()->guard()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('admin.login'));
    }
}
