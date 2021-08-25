<?php

namespace App\Http\Middleware;

use Closure;

class ChargeMiddelware
{
    use Responses ; 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->wallet->charge == 0 ) {
            $this->response('fail' , __('auth.have_no_credit')) ; 
        }
        return $next($request);
    }
}
