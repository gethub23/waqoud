<?php

namespace App\Observers;


use App\Models\Worker;
use File ;
class WorkerObserver
{
    /**
    * Handle the Worker "created" event.
    *
    * @param \App\Worker $Worker
    * @return void
    */
   public function creating(Worker $Worker)
   {
      
   }

   public function created(Worker $Worker)
   {

   }

   /**
    * Handle the Worker "updated" event.
    *
    * @param \App\Worker $Worker
    * @return void
    */

     public function updating (Worker $Worker)
   {
      if (request()->has('avatar')) {
            if ($Worker->getRawOriginal('avatar') != 'default.png'){
               File::delete(public_path('/storage/images/workers/' . $Worker->getRawOriginal('avatar')));
            }
       }
   }
   public function updated(Worker $Worker)
   {

   }

   /**
    * Handle the Worker "deleted" event.
    *
    * @param \App\Worker $Worker
    * @return void
    */
   public function deleted(Worker $Worker)
   {
       if ($Worker->avatar != 'default.png'){
           File::delete(public_path('/storage/images/workers/' . $Worker->getRawOriginal('avatar')));
       }
       
   }

   /**
    * Handle the Worker "restored" event.
    *
    * @param \App\Worker $Worker
    * @return void
    */
   public function restored(Worker $Worker)
   {
       //
   }

   /**
    * Handle the Worker "force deleted" event.
    *
    * @param \App\Worker $Worker
    * @return void
    */
   public function forceDeleted(Worker $Worker)
   {
       //
   }
}
