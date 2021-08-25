<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\Firebase;
use App\Notifications\NotifyUser as Notify ;

class NotifyUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Firebase;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $users  , $data;


    public function __construct($users,$request)
    {
        $this->data = [
            'sender'        => auth()->id(),
            'sender_name'   => auth()->user()->name,
            'sender_avatar' => auth()->user()->avatar,
            'title_ar'      => 'تنبيه اداري',
            'title_en'      => 'Administrative Notify',
            'message_ar'    => $request->message_ar ? $request->message_ar : $request->message_en ,
            'message_en'    => $request->message_en ? $request->message_en : $request->message_ar,
            'type'       => 0 ,
        ];
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (is_array($this->users)){
            foreach ($this->users as $user){
                $this->sendNotification($user ,$this->data) ;
                $this->user->notify(new Notify($this->data));
            }
        }else{
            $this->sendNotification($this->users ,$this->data) ;
            $this->users->notify(new Notify($this->data));
        }

    }
}
