<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IOrder;
use App\Repositories\Interfaces\ISetting;

class HomeController extends Controller
{
    protected $order ;
    protected $settings ;

    public function __construct(IOrder $order , ISetting $settings)
    {
        $this->order = $order ; 
        $this->settings = $settings ; 
    }

    public function home()
    {
        $orders = auth('station')->user()->orders ; 
        return view('provider.orders.index' , compact('orders'));
    }

    public function terms()
    {
        $terms = $this->settings->getAppInformation();
        return view('provider.terms' , compact('terms'));
    }
}
