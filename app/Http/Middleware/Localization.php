<?php

namespace App\Http\Middleware;

use   App;
use   Closure;
use   App\Models\User;
use   Carbon\Carbon;
use   App\Traits\Expo ;
class localization
{
    use Expo;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = 'ar' ; 

        if ($request->header('lang')) {
            $lang = $request->header('lang') ; 
        } else if(request('lang')){
            $lang = request('lang') ; 
        }
        App::setLocale($lang) ;
        return $next($request);
    }
}
