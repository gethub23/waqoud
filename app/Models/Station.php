<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Station extends  Authenticatable 
{

    use Notifiable;
    use UploadTrait;

    protected $guarded      = ['id'];

    protected $hidden       = [
        'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['avatar','name','phone','email','password','latitude','longitude','boss_name','boss_avatar','boss_phone','boss_identity','active','block','code','code_expire','city_id'];

    /**
     * Get the city that owns the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/stations/'.$value);
    }

    // public function setAvatarAttribute($value)
    // {
    //     if ($value != null)
    //     {
    //         $this->attributes['avatar'] = $this->uploadAllTyps($value, 'stations');
    //     }
    // }

    public function getBossAvatarAttribute($value)
    {
        return asset('/storage/images/stations/'.$value);
    }

    // public function setBossAvatarAttribute($value)
    // {
    //     if ($value != null)
    //     {
    //         $this->attributes['boss_avatar'] = $this->uploadAllTyps($value, 'stations');
    //     }
    // }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function scopeActive($query)
    {
        return $query->where('active' , 1 );
    }
    public function scopeNotActive($query)
    {
        return $query->where('active' , 0 );
    }
}
