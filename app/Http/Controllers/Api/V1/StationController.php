<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IStation;
use App\Http\Resources\Api\StationResource;

class StationController extends Controller
{
    use Responses ; 
    protected $station ; 

    public function __construct(IStation $station)
    {
        $this->station = $station ;
    }

    public function stations()
    {
        $this->response('success' , '' , StationResource::collection($this->station->where(['active' => 1 , 'block' => 0]))) ; 
    }
}
