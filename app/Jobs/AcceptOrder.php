<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\Firebase;
use App\Notifications\NotifyUser as Notify ;

class AcceptOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Firebase ; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user  , $data;


    public function __construct($order)
    {
        $this->data = [
            'sender'        => auth()->id()    ,
            'sender_type'   => 'user'    ,
            'title_ar'      => 'قبول طلب ملئ الوقود'    ,
            'title_en'      => 'fuel fill request',
            'message_ar'    => 'لقد قام العميل ' . $order->user->name . ' بقبول طلب ملئ الوقود بسعر ' .$order->total_price,
            'message_en'    => 'customer ' . $order->user->name . ' has accepting the request to fill the fuel at a price ' .$order->total_price ,
            'type'          => 'accept_order' ,
            'order_id'      => $order->id ,
        ];
        $this->user = $order->worker ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sendNotification($this->user , $this->data , 'worker' ) ;
        $this->user->notify(new Notify($this->data));
    }
}
