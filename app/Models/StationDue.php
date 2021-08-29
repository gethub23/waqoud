<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationDue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_price','order_id','station_wallet_id'];

    /**
     * Get the order that owns the StationDue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Get the stationWallet that owns the StationDue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stationWallet()
    {
        return $this->belongsTo(StationWallet::class, 'station_wallet_id', 'id');
    }
}
