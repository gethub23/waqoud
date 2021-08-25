<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerDevice extends Model
{
    protected $fillable = ['device_id','worker_id','device_type'];
}
