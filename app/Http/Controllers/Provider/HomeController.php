<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IOrder;

class HomeController extends Controller
{
    protected $order ;

    public function __construct(IOrder $order)
    {
        $this->order = $order ; 
    }

    public function home()
    {
        $orders = auth('station')->user()->orders ; 
        return view('provider.orders.index' , compact('orders'));
    }
}
