<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IFuel;
use App\Http\Resources\Api\FuelResource;

class FuelController extends Controller
{
    use Responses ;

    protected $fuel;

    public function __construct(IFuel $fuel)
    {
        $this->fuel = $fuel;
    }
    // fuels list 
    public function fuels()
    {
        $this->response('response' , '' , FuelResource::collection($this->fuel->get()));
    }
}
