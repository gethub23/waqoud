<?php

namespace App\Repositories\Eloquent;

use App\Jobs\EmailOne;
use App\Models\SiteSetting;
use App\Repositories\Interfaces\ISetting;
use App\Services\SettingService;
use App;
use Image;
class SettingRepository extends AbstractModelRepository implements ISetting
{

    public function __construct(SiteSetting $model)
    {
        parent::__construct($model);
    }

    public function updateSetting($data=[])
    {
        foreach ( $data as $key => $val )
            if ($key == 'logo') {
                $img           = Image::make($val);
                $name          = $key .'.png';
                $thumbsPath    = 'storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'default_user'){
                $img           = Image::make($val);
                $name          = 'default.png';
                $thumbsPath    = 'storage/images/users';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'about_image_1'){
                $img           = Image::make($val);
                $name          = 'about_image_1.png';
                $thumbsPath    = 'storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'about_image_2'){
                $img           = Image::make($val);
                $name          = 'about_image_2.png';
                $thumbsPath    = 'storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'intro_loader'){
                $img           = Image::make($val);
                $name          = 'intro_loader.png';
                $thumbsPath    = 'storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($key == 'intro_logo'){
                $img           = Image::make($val);
                $name          = 'intro_logo.png';
                $thumbsPath    = 'storage/images/settings';
                $img->save($thumbsPath . '/' . $name);
                $this->model->where( 'key', $key ) -> update( [ 'value' => $name ] );
            }else if($val){
                $this->model->where( 'key', $key ) -> update( [ 'value' => $val ] );
            }
    }

     public  function getAppInformation()
     {
         return SettingService::appInformations($this->model::pluck('value', 'key'));
     }


     public function reports(){
        return [
        ];
     }


     public function contactInfo(){
        $data           = $this->getAppInformation();
        return [
            'latitude'                   => $data['latitude'],
            'longitude'                  => $data['longitude'],
        ];
     }

     public function getPage($page){
        $data           =  $this->getAppInformation();
        return  $data[$page] ;
     }

    public function sendEmail($data=[])
    {
        dispatch(new EmailOne($data['email'], $data['message']));
    }
}
