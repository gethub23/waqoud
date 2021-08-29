<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationWallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = ['station_id' , 'credit'];

    /**
     * Get the station that owns the StationWallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    /**
     * Get all of the dues for the StationWallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dues()
    {
        return $this->hasMany(StationDue::class, 'station_wallet_id', 'id');
    }
}
