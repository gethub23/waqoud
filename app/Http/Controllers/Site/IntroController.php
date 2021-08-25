<?php

namespace App\Http\Controllers\Site;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISetting;
use App\Repositories\Interfaces\IIntroSlider;
use App\Repositories\Interfaces\IIntroSocial;
use App\Http\Requests\Site\sendMessageRequest;
use App\Repositories\Interfaces\IIntroHowWork;
use App\Repositories\Interfaces\IIntroService;
use App\Repositories\Interfaces\IIntroMessages;
use App\Repositories\Interfaces\IIntroPartener;
use App\Repositories\Interfaces\IIntroFqsCategory;

class IntroController extends Controller
{
    protected $slider , $setting , $services , $fqsCategories ,$message , $howWork , $social ;

    public function __construct(IIntroHowWork $howWork, IIntroMessages $message , IIntroSlider $slider , ISetting $setting , IIntroService $services , IIntroFqsCategory $fqsCategories , IIntroPartener $parteners ,IIntroSocial $social)
    {
        $this->slider        = $slider;
        $this->setting       = $setting;
        $this->services      = $services;
        $this->fqsCategories = $fqsCategories;
        $this->parteners     = $parteners;
        $this->message       = $message;
        $this->howWork       = $howWork;
        $this->social        = $social;

    }
    public function index()
    {
        view()->share([
            'services'        => $this->services->get() ,
            'sliders'         => $this->slider->get() ,
            'fqsCategories'   => $this->fqsCategories->get() ,
            'parteners'       => $this->parteners->get() ,
            'howWorks'        => $this->howWork->get() ,
            'socials'         => $this->social->get() ,
            'settings'        => $this->setting->getAppInformation() ,
        ]);
        return view('intro_site.index');
    }


    public function sendMessage(sendMessageRequest $request)
    {
        $this->message->store($request->validated());
        return response()->json(['status' => 'done' , 'message' => __('intro_site.message_sent') ]) ;
    }

    /***************** change lang  *****************/
    public function SetLanguage($lang)
    {
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', $lang );

        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }

//        dd(session( 'lang' ));
        return back();
    }
}
