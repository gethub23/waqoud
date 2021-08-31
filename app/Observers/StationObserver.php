<?php

namespace App\Observers;

use App\Models\Station;
use App\Models\StationWallet;
use File ;
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
            'station_id' => $Station->id ,
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
        if (request()->has('avatar')) {
            if ($Station->getRawOriginal('avatar') != 'default.png'){
               File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('avatar')));
            }
       }
       if (request()->has('boss_avatar')) {
            if ($Station->getRawOriginal('boss_avatar') != 'default.png'){
                    File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('boss_avatar')));
            }
        }
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
        if ($Station->avatar != 'default.png'){
            File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('avatar')));
        }
        if ($Station->boss_avatar != 'default.png'){
            File::delete(public_path('/storage/images/stations/' . $Station->getRawOriginal('boss_avatar')));
        }
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
