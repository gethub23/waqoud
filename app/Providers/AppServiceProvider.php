<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Bank;
use App\Models\User;
use App\Models\AdImage;

use App\Models\PhotoAd;
use App\Models\Station;
use App\Models\Category;
use App\Models\Permission;
use App\Models\SiteSetting;
use App\Observers\AdObserver;
use App\Observers\BankObserver;
use App\Observers\UserObserver;
use App\Observers\AdImageObserver;
use App\Observers\PhotoAdObserver;
use App\Observers\StationObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ISetting ;

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
         User    ::observe(UserObserver::class);
         Station ::observe(StationObserver::class);
        // -------------- lang ---------------- \\
            app()->singleton('lang', function (){
                if ( session() -> has( 'lang' ) )
                    return session( 'lang' );
                else
                    return 'ar';

            });
        // -------------- lang ---------------- \\

        // view()->share('settings', SiteSetting::get());
    }
}
