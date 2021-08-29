<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IStationDue;
use App\Repositories\Interfaces\IStationWallet;
use DB ;
class StationWalletController extends Controller
{
    protected $Repo;
    protected $due;

    public function __construct(IStationWallet $IRepo , IStationDue $due)
    {
        $this->Repo = $IRepo;
        $this->due  = $due;
    }

    /***************************  get all   **************************/
    public function index()
    {
        $rows = $this->Repo->Where([['credit' , '>' , 0]]);
        return view('admin.stationwallets.index', compact('rows'));
    }

    /***************************  update   **************************/
    public function update(Request $request, $id)
    {
        $row = $this->Repo->findOrFail($id);
        $ids = array_map('intval', explode(',', $request->ids)) ;
        $dues = $this->due->whereIn($ids);
        foreach ($dues as $due) {
            $row->update(['credit' => DB::raw('credit - '.$due->order_price)]) ;
            $due->delete();
        }
        return response()->json();
    }
}
