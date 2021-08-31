<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['iban','account_name','account_number','bank_id','station_id'];

    /**
     * Get the Station that owns the StationAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    /**
     * Get the bank that owns the StationAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
