<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ICity;
use App\Repositories\Interfaces\ICountry;
use App\Http\Requests\Provider\Settings\updateSettingsRequest;

class settingController extends Controller
{
    
    protected $city ;
    protected $country ;

    public function __construct(ICity $city , ICountry $country)
    {
        $this->city   = $city ; 
        $this->country   = $country ; 
    }

    public function settings()
    {
        $cities = $this->city->get() ; 
        $keys   = $this->country->get() ; 
        return view('provider.settings.index' , compact('keys' , 'cities'));
    }

    public function updateSettings(updateSettingsRequest $request)
    {
        auth()->user()->update($request->validated());
        return response()->json(['message' => __('site.edited') ]);
    }
}
