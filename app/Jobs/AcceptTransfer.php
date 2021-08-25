<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Traits\Firebase;
use App\Notifications\NotifyUser as Notify ;

class AcceptTransfer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Firebase;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user  , $data;


    public function __construct($transfer)
    {
        if ($transfer->type == 'year') {
            $this->data = [
                'sender'        => auth('worker')->id()    ,
                'title_ar'      => 'قبول حوالة بنكية'    ,
                'title_en'      => 'Bank Transfer Accept',
                'message_ar'    => 'تم قبول حوالة الاشتراك لدي التطبيق بقيمة  ' . $transfer->amount,
                'message_en'    => 'Your Subscribe transfer has been accepted with the application in the amount of '. $transfer->ammount ,
                'type'          => 'charge_transfer' ,
            ];
        }else{
            $this->data = [
                'sender'        => auth('worker')->id()    ,
                'title_ar'      => 'قبول حوالة بنكية'    ,
                'title_en'      => 'Bank Transfer Accept',
                'message_ar'    => 'تم قبول حوالة الشحن لدي التطبيق بقيمة  ' . $transfer->amount,
                'message_en'    => 'Your Charge transfer has been accepted with the application in the amount of '. $transfer->ammount ,
                'type'          => 'year_transfer' ,
            ];
        }
        
        $this->user = $transfer->user ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendNotification($this->user ,$this->data , 'user' ) ;
        $this->user->notify(new Notify($this->data));
    }
}
