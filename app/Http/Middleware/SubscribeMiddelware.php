<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Responses;

class SubscribeMiddelware
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
        if (!auth()->user()->subscribed) {
            $this->response('fail' , __('auht.not_subscribed')) ; 
        }
        return $next($request);
    }
}
