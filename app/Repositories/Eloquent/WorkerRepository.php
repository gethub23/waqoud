<?php

namespace App\Repositories\Eloquent;

use App\Models\Worker;
use App\Models\WorkerDevice;
use App\Repositories\Interfaces\IWorker;
use Tymon\JWTAuth\Facades\JWTAuth;

class WorkerRepository extends AbstractModelRepository implements IWorker
{
    protected $workerDevice ;
    public function __construct(Worker $model , WorkerDevice $workerDevice)
    {
        $this->workerDevice = $workerDevice ;
        parent::__construct($model);
    }

    
    public function updateDeviceId($worker,$request){
        $worker->update([ 'device_id' => $request['device_id'] , 'token' => JWTAuth::fromUser($worker) ]);
        WorkerDevice::updateOrcreate( [
            'device_id'   => $request['device_id'],
            'device_type' => $request['device_type'],
            'worker_id'   => $worker->id,
        ] );
    }
}
