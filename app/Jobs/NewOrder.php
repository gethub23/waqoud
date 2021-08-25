<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\Firebase;
use App\Notifications\NotifyUser as Notify ;

class NewOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Firebase;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user  , $data;


    public function __construct($order)
    {
        $this->data = [
            'sender'        => auth('worker')->id()    ,
            'sender_type'   => 'worker'    ,
            'title_ar'      => 'طلب ملئ وقود'    ,
            'title_en'      => 'fuel fill request',
            'message_ar'    => 'لديك طلب ملئ وقود جديد من بنزينة  ' . $order->station->name,
            'message_en'    => 'You have a request to fill in new fuel from Station '. $order->station->name ,
            'type'          => 'new_order' ,
            'order_id'      => $order->id ,
        ];
        $this->user = $order->user ;
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
