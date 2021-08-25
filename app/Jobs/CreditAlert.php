<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\Firebase;
use App\Notifications\NotifyUser as Notify ;

class CreditAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Firebase ;
    protected $user  , $data;


    public function __construct($user)
    {
        $this->data = [
            'sender'        => auth('worker')->id()    ,
            'title_ar'      => 'فشل طلب ملئ الوقود'    ,
            'title_en'      => 'fuel fill request fail',
            'message_ar'    => 'فشلت عملية ملئ الوقود حاليا بسبب عدم توفر رصيد كافي بحسابك لدينا برجاء اعاده الشحن',
            'message_en'    => 'The fuel filling process has currently failed due to insufficient balance in your account with us. Please recharge' ,
            'type'          => 'fail_fuel_fill' ,
        ];
        $this->user = $user ;
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
