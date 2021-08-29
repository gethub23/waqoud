<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IStationDue;
use DB ;
class StationDueController extends Controller
{
    protected $Repo;

    public function __construct(IStationDue $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index($id)
    {
        $rows = $this->Repo->where(['station_wallet_id' => $id]);
        return view('admin.stationdues.index', compact('rows'));
    }

    /***************************  update   **************************/
    public function update($id)
    {
        $order = $this->Repo->findOrFail($id);
        $order->stationWallet->update(['credit' => DB::raw('credit - '.$order->order_price)]);
        $order->delete();
        return response()->json();
    }
}
