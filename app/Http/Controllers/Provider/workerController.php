<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ICity;
use App\Repositories\Interfaces\IWorker;
use App\Repositories\Interfaces\ICountry;
use App\Http\Requests\Provider\Workers\addWorkerRequest;

class workerController extends Controller
{
    protected $worker ;
    protected $city ;
    protected $country ;

    public function __construct(IWorker $worker , ICity $city , ICountry $country)
    {
        $this->worker = $worker ; 
        $this->city   = $city ; 
        $this->country   = $country ; 
    }

    public function workers()
    {
        $workers = auth('station')->user()->workers ; 
        return view('provider.workers.index' , compact('workers'));
    }

    public function addWorkerPage()
    {
        $cities = $this->city->get() ; 
        $keys   = $this->country->get() ; 
        return view('provider.workers.add' , compact('keys' , 'cities'));
    }

    public function addWorker(addWorkerRequest $request)
    {
        $this->worker->store($request->validated() + (['station_id' => auth('station')->id()])) ; 
        return response()->json(['status' => 'success' , 'message' => __('site.worker_added') , 'url'  => url('provider/workers')]);
    }

    public function editWorkerPage($id)
    {
        $cities = $this->city->get() ; 
        $keys   = $this->country->get() ; 
        $worker = $this->worker->findOrFail($id); 
        return view('provider.workers.edit' , compact('worker','keys' , 'cities'));
    }

    public function editWorker(addWorkerRequest $request , $id)
    {
        $worker = $this->worker->findOrFail($id); 
        $worker->update($request->validated());
        return response()->json(['status' => 'success' , 'message' => __('site.worker_edited') , 'url'  => url('provider/workers')]);
    }


    public function deleteWorker($id)
    {
        $this->worker->findOrFail($id)->delete(); 
        return response()->json(['message' => __('site.worker_deleted')]);
    }
}
