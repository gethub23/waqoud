<?php

namespace App\Http\Controllers\Api\V1;

use DB ;
use App\Jobs\NewOrder;
use App\Jobs\AcceptOrder;
use App\Jobs\CreditAlert;
use App\Jobs\FinishOrder;
use App\Traits\Responses;
use App\Jobs\SubscribeAlert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IFuel;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\IOrder;
use App\Http\Resources\Api\OrderResource;
use App\Http\Requests\Api\Orders\newOrderRequest;

class OrderController extends Controller
{
    use Responses ;

    protected $order;
    protected $fuel;
    protected $user;

    public function __construct(IOrder $order , IFuel $fuel , IUser $user)
    {
        $this->order = $order;
        $this->fuel  = $fuel;
        $this->user  = $user;
    }

    public function newOrder(newOrderRequest $request)
    {
        $fuel = $this->fuel->findOrFail($request->fuel_id) ; 
        $total_price = $fuel->price * $request->liters ; 
        $this->checkUserWallet($request->user_id , $total_price) ;

        $order = $this->order->store($request->validated() + (
            [
                'liter_price'  => $fuel->price , 
                'total_price'  => $fuel->price * $request->liters , 
                'worker_id'    => auth('worker')->id() , 
                'station_id'   => auth('worker')->user()->station_id , 
            ]
        ));
        NewOrder::dispatch($order) ; 

        $this->response('success' , __('apis.order_request_success'), new OrderResource($order)) ;
    }

    public function checkUserWallet($user_id , $total_price)
    {
        $user = $this->user->findOrfail($user_id) ; 
        if ($user->subscribed == 0){ 
            SubscribeAlert::dispatch($user);
            $this->response('fail' , __('apis.user_have_no_subscribed'));
        }else if ($user->wallet->charge >= $total_price) {
            return ;
        }else{
            CreditAlert::dispatch($user);
            $this->response('fail' , __('apis.user_have_no_credit'));
        }
    }

    public function acceptOrder($id)
    {
        $order = $this->order->findOrfail($id) ; 
        if (auth()->id() != $order->user_id) 
            $this->response('fail' , __('auth.not_authorized'));
            
        $order->update(['status' => 'accepted']) ; 
        AcceptOrder::dispatch($order) ; 
        $this->response('success' , __('apis.order_accepted'), new OrderResource($order));
    }
    public function finishOrder($id)
    {
        $order = $this->order->findOrfail($id) ; 
        if (auth()->id() != $order->user_id) 
            $this->response('fail' , __('auth.not_authorized'));
            
        $order->update(['status' => 'finished']) ;
        auth()->user()->wallet()->update(['charge' => DB::raw('charge - '.$order->total_price)]); 
        FinishOrder::dispatch($order) ; 
        $this->response('success' , __('apis.order_finished') , new OrderResource($order));
    }

    public function orders()
    {
        $orders = $this->order->where(['user_id' => auth()->id() , 'status' => 'finished']) ; 
        $this->response('success' , '',  OrderResource::collection($orders));
    }
}
