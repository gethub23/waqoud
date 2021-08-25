<?php

namespace App\Traits;
use FCM;
use App\Models\UserToken ;
use App\Models\WorkerDevice;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Illuminate\Http\Exceptions\HttpResponseException;

trait  Firebase
{
    public function sendNotification($user , $data , $type)
    {
        if ($type == 'user') {
            $firebaseToken = UserToken::where('user_id' , $user->id)->pluck('device_id')->all();
        }elseif ($type == 'worker') {
            $firebaseToken = WorkerDevice::where('worker_id' , $user->id)->pluck('device_id')->all();
        }

        // $SERVER_API_KEY = 'AAAA3KdRHfg:APA91bHiGo0eUR9BVSasj762Usk6gODoD022WIb9YVtahM8nhpnqjkUmOzlcR0DTLC-YRCtUvb3fVSccwwkWwgxvaHn6V9o9suL2v2W_OQB1xy46iyno_-YOtX4w4wPCpk2cvfHj8gAu';
        $SERVER_API_KEY = 'AAAAVYoWgDU:APA91bEU9m3M7z5TeNAlKqwl2sI5XU78yNRDCNPt95M2RDjfZG9O5ZGxrH_wcqIClEDY3TWgyMOp9vH56O5ilbm2vYp-8tIN_8dGvnbtea4s5hMlXYyCQZR2h0kM07l3pXB9iiZbgz_q';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $data['title_'.$user->lang],
                "body"  => $data['message_'.$user->lang],
                'sound' => true,
            ],
            'data'  => $data
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
    }
}

