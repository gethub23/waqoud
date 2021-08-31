<?php

namespace App\Observers;

use App\Models\Bank;
use File ;
class BankObserver
{
    /**
     * Handle the Bank "created" event.
     *
     * @param \App\Bank $Bank
     * @return void
     */
    public function creating(Bank $Bank)
    {
       
    }

    public function created(Bank $Bank)
    {

    }

    /**
     * Handle the Bank "updated" event.
     *
     * @param \App\Bank $Bank
     * @return void
     */

      public function updating (Bank $Bank)
    {
       if (request()->has('icon')) {
             if ($Bank->getRawOriginal('icon') != 'default.png'){
                File::delete(public_path('/storage/images/banks/' . $Bank->getRawOriginal('icon')));
             }
        }
    }
    public function updated(Bank $Bank)
    {

    }

    /**
     * Handle the Bank "deleted" event.
     *
     * @param \App\Bank $Bank
     * @return void
     */
    public function deleted(Bank $Bank)
    {
        if ($Bank->icon != 'default.png'){
            File::delete(public_path('/storage/images/banks/' . $Bank->getRawOriginal('icon')));
        }
        
    }

    /**
     * Handle the Bank "restored" event.
     *
     * @param \App\Bank $Bank
     * @return void
     */
    public function restored(Bank $Bank)
    {
        //
    }

    /**
     * Handle the Bank "force deleted" event.
     *
     * @param \App\Bank $Bank
     * @return void
     */
    public function forceDeleted(Bank $Bank)
    {
        //
    }
}
