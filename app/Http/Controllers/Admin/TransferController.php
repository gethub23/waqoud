<?php

namespace App\Http\Controllers\Admin;

use DB ;
use App\Jobs\AcceptTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ITransfer;

class TransferController extends Controller
{
    protected $Repo;

    public function __construct(ITransfer $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index()
    {
        $rows = $this->Repo->get();
        return view('admin.transfers.index', compact('rows'));
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
         $row = $this->Repo->findOrFail($id);
         $this->Repo->softDelete($row);
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->Repo->delete($ids)) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function accept($id , $type)
    {
        $transfer = $this->Repo->findOrFail($id) ; 
        if ($type == 'accept') {
            $transfer->update(['accepted' => 'accepted']) ;
            $user = $transfer->user ; 
            if ($transfer->type == 'year') {
                $user->update(['subscribed' => true , 'subscribe_end' => Carbon::now()->addYear()]);
            }else{
                $user->packages()->attach($transfer->package_id , ['price' => $transfer->package->price]) ; 
                $user->wallet->update(['charge' => DB::raw('charge + '.$transfer->package->price)]); 
            }
            AcceptTransfer::dispatch($transfer);
            return response()->json(['status' => 'done' , 'message' => __('site.transfer_accepted')]); 
        }else{
            $transfer->update(['accepted' => 'refused']) ;
            AcceptTransfer::dispatch($transfer);
            return response()->json(['status' => 'fail' , 'message' => __('site.transfer_refused')]); 
        }
    }

}
