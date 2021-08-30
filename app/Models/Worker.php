<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Worker extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UploadTrait;

    protected $guarded      = ['id'];

    protected $hidden       = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key','name','phone','password','identity','salary','city_id','station_id' , 'avatar','token' ,'key'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/workers/'.$value);
    }

    // public function setAvatarAttribute($value)
    // {
    //     if ($value != null)
    //     {
    //         $this->attributes['avatar'] = $this->uploadAllTyps($value, 'workers');
    //     }
    // }

    public function getBossAvatarAttribute($value)
    {
        return asset('/storage/images/stations/'.$value);
    }


    /**
     * Get the user that owns the Worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    /**
     * Get the station that owns the Worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }


    /**
     * Get all of the devices for the Worker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany(WorkerDevice::class, 'worker_id', 'id');
    }


}
