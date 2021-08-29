<?php

namespace App\Observers;

use App\Models\Station;
use App\Models\StationWallet;

class StationObserver
{
    /**
     * Handle the Station "created" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function creating(Station $Station)
    {
       
    }

    public function created(Station $Station)
    {

        StationWallet::create([
            'Station_id' => $Station->id ,
        ]);      
    }

    /**
     * Handle the Station "updated" event.
     *
     * @param \App\Station $Station
     * @return void
     */

      public function updating (Station $Station)
    {
       
    }
    public function updated(Station $Station)
    {

    }

    /**
     * Handle the Station "deleted" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function deleted(Station $Station)
    {
        
    }

    /**
     * Handle the Station "restored" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function restored(Station $Station)
    {
        //
    }

    /**
     * Handle the Station "force deleted" event.
     *
     * @param \App\Station $Station
     * @return void
     */
    public function forceDeleted(Station $Station)
    {
        //
    }
}
