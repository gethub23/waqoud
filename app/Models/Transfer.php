<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use UploadTrait ; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','bank_from_name','phone','amount','image','accepted','type','bank_id','package_id','user_id'];

    /**
     * Get the user that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the bank that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    /**
     * Get the package that owns the Transfer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function getImageAttribute($value)
    {
        return asset('/storage/images/banks/'.$value);
    }

    public function setImageAttribute($value)
    {
        if ($value != null)
        {
            $this->attributes['image'] = $this->uploadAllTyps($value, 'banks');
        }
    }
}
