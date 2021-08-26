<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['user_name' , 'user_id' , 'complaint' , 'phone' , 'station_id' , 'worker_id' ,'type']; 

    /**
     * Get the station that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }


    /**
     * Get the user that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /**
     * Get the worker that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }
}
