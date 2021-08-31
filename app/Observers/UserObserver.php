<?php

namespace App\Observers;

use File ;
use JWTAuth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function creating(User $user)
    {
       
    }

    public function created(User $user)
    {

        Wallet::create([
            'user_id' => $user->id ,
        ]);      
    }

    /**
     * Handle the user "updated" event.
     *
     * @param \App\User $user
     * @return void
     */

      public function updating (User $user)
    {
       if (request()->has('avatar')) {
             if ($user->getRawOriginal('avatar') != 'default.png'){
                File::delete('/storage/images/users/' . $user->getRawOriginal('avatar'));
             }
        }
    }
    public function updated(User $user)
    {

    }

    /**
     * Handle the user "deleted" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        if ($user->avatar != 'default.png'){
            File::delete('public/storage/images/users/' . $user->avatar);
        }
        
    }

    /**
     * Handle the user "restored" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
