<?php

namespace App\Models;

use App\Traits\UploadTrait;
use App\Models\FollowUp;
use App\Models\Rate;
use App\Models\Chat;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UploadTrait;

    protected $guarded      = ['id'];

    protected $hidden       = [
        'password', 'remember_token',
    ];

    protected $fillable     = ['name','phone','email','password','avatar','role_id','user_type','device_id','code','token'
                                ,'lang','address','code_expire','active','latitude','longitude','is_notify','key','block'
                                ,'identity' , 'gender' , 'birthdate' , 'subscribed', 'subscribe_end'
                              ];


    public function scopeUser($query)
    {
        return $query->where('user_type', 'user');
    }

    public function scopeAdmin($query)
    {
        return $query->where('user_type', 'admin');
    }

    public function getAvatarAttribute($value)
    {
        return asset('/storage/images/users/'.$value);
    }

    public function setAvatarAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['avatar'] = $this->uploadAllTyps($value, 'users');
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class)->withTrashed();
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function devices(){
        return $this->hasMany(UserToken::class);
    }

    public function notfications()
    {
        return $this->hasMany('App\Models\Ad', 'user_id', 'id');
    }

    /**
     * Get the wallet associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

    /**
     * The packages that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class , 'package_users');
    }
}
