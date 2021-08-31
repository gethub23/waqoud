<?php

namespace App\Observers;

use App\Models\Image;
use File ;
class ImageObserver
{
    /**
     * Handle the Image "created" event.
     *
     * @param \App\Image $Image
     * @return void
     */
    public function creating(Image $Image)
    {
       
    }

    public function created(Image $Image)
    {

    }

    /**
     * Handle the Image "updated" event.
     *
     * @param \App\Image $Image
     * @return void
     */

      public function updating (Image $Image)
    {
       if (request()->has('image')) {
             if ($Image->getRawOriginal('image') != 'default.png'){
                File::delete(public_path('/storage/images/sliders/' . $Image->getRawOriginal('image')));
             }
        }
    }
    public function updated(Image $Image)
    {

    }

    /**
     * Handle the Image "deleted" event.
     *
     * @param \App\Image $Image
     * @return void
     */
    public function deleted(Image $Image)
    {
        if ($Image->image != 'default.png'){
            File::delete(public_path('/storage/images/sliders/' . $Image->getRawOriginal('image')));
        }
        
    }

    /**
     * Handle the Image "restored" event.
     *
     * @param \App\Image $Image
     * @return void
     */
    public function restored(Image $Image)
    {
        //
    }

    /**
     * Handle the Image "force deleted" event.
     *
     * @param \App\Image $Image
     * @return void
     */
    public function forceDeleted(Image $Image)
    {
        //
    }
}
