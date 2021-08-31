<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\User;
use App\Models\Image;

use App\Models\Intro;
use App\Models\Social;
use App\Models\Worker;

use App\Models\Station;
use App\Models\IntroSlider;
use App\Models\IntroHowWork;
use App\Observers\BankObserver;
use App\Observers\UserObserver;
use App\Observers\ImageObserver;
use App\Observers\IntroObserver;
use App\Observers\SocialObserver;
use App\Observers\WorkerObserver;
use App\Observers\StationObserver;
use App\Observers\IntroSliderObserver;
use App\Observers\IntroHowWorkObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         User           ::observe(UserObserver::class);
         Station        ::observe(StationObserver::class);
         Bank           ::observe(BankObserver::class);
         Image          ::observe(ImageObserver::class);
         Intro          ::observe(IntroObserver::class);
         Social         ::observe(SocialObserver::class);
         IntroHowWork   ::observe(IntroHowWorkObserver::class);
         Worker         ::observe(WorkerObserver::class);
         IntroSlider    ::observe(IntroSliderObserver::class);
        // -------------- lang ---------------- \\
            app()->singleton('lang', function (){
                if ( session() -> has( 'lang' ) )
                    return session( 'lang' );
                else
                    return 'ar';

            });
        // -------------- lang ---------------- \\

    }
}
