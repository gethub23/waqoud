<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IIntro;
use App\Http\Resources\Api\IntroResource;

class IntroController extends Controller
{
    use Responses;

    protected $intro;

    public function __construct(IIntro $intro)
    {
        $this->intro = $intro;
    }


    public function intros()
    {
        $intros =  IntroResource::collection($this->intro->get()) ; 
        $this->sendResponse($intros);
    }
}
