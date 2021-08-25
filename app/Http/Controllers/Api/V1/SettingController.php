<?php

namespace App\Http\Controllers\Api\V1;
use App;
use App\Traits\Responses;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISocial;
use App\Repositories\Interfaces\ISetting;
use App\Http\Resources\Api\SocialResource;

class SettingController extends Controller
{
    use     Responses;


    private $settingRepository;
    private $social;

    public function __construct(ISetting $settingRepository , ISocial $social)
    {
        $this->settingRepository  = $settingRepository;
        $this->social             = $social;
    }

    public function appInfo()
    {
        $this->response('success' , '' , [
            'map'     => $this->settingRepository->contactInfo() , 
            'socials' => SocialResource::collection($this->social->get()) , 
        ]);

    }

    public function about()
    {
        $about = $this->settingRepository->getPage('about_'.lang()) ;
        $this->sendResponse($about);
    }

    public function privacy()
    {
        $privacy = $this->settingRepository->getPage('privacy_'.lang()) ;
        $this->sendResponse($privacy);
    }
   
    public function terms()
    {
        $about = $this->settingRepository->getPage('terms_'.lang()) ;
        $this->sendResponse($about);
    }
}

