<?php

namespace App\Repositories\Eloquent;

use App\Models\Station;
use App\Repositories\Interfaces\IStation;
use DB ;
class StationRepository extends AbstractModelRepository implements IStation
{
    public function __construct(Station $model)
    {
        parent::__construct($model);
    }
    
    public function addCreditToStation($order)
    {
        $station = $this->model->findOrFail($order->station_id) ; 
        $wallet  =  $station->creditOnApp()->updateOrCreate([],['credit' =>  DB::raw('credit + '.$order->total_price)]);
        $wallet->dues()->create(['order_price' => $order->total_price , 'station_id' => $station->id , 'order_id' => $order->id]) ; 
        return ;
    }
}
