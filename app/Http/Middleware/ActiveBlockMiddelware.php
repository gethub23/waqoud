<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\Responses;
use App\Repositories\Interfaces\IUser;

class ActiveBlockMiddelware
{

    use Responses ;
    private $userRepository;

    public function __construct(IUser $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->active) {
            $this->userRepository->updateCode(auth()->user());
            $this->response('needActive' , __('auht.not_active')) ; 
        }
        if (auth()->user()->block) {
            $this->response('blocked' , __('auth.blocked')) ; 
        }
        return $next($request);
    }
}
