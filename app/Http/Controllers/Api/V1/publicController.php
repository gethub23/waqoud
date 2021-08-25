<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Traits\Responses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IImage;
use App\Http\Resources\Api\ImageResource;
use App\Repositories\Interfaces\ICountry;
use App\Http\Resources\Api\CountryResource;

class publicController extends Controller
{
    use Responses ;

    protected $keys , $image;

    public function __construct(ICountry $keys , IImage $image)
    {
        $this->keys = $keys;
        $this->image = $image;
    }

    public function countryKeys()
    {
        $keys = CountryResource::collection($this->keys->get()) ;
        $this->response('response' , '' ,$keys);
    }

    public function home()
    {
        $days = Carbon::now()->diffInDays(auth()->user()->subscribe_end, false) ; 
        $data = [
            'charge' => auth()->user()->wallet->charge 
            , 'remaining_days'  => $days > 0 ? $days : 0  ] ;
        $this->response('response' , '' , $data);
    }

    public function sliders()
    {
        $this->response('response' , '' ,ImageResource::collection($this->image->get()));
    }

}
