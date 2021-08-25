<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Responses;

class WorkerMiddleware
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
        if (!auth('worker')->check()) {
            $this->response('fail' , __('auth.not_authorized')) ; 
        }
        return $next($request);
    }
}
