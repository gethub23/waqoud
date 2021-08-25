<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Bank;
use App\Models\User;
use App\Models\AdImage;

use App\Models\PhotoAd;
use App\Models\Category;
use App\Models\Permission;
use App\Observers\AdObserver;
use App\Observers\BankObserver;
use App\Observers\UserObserver;
use App\Observers\AdImageObserver;
use App\Observers\PhotoAdObserver;
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
         User ::observe(UserObserver::class);
         view()->composer('*', function ($view) 
            {
                // view()->share([
                //     'permissions' => Permission::where('role_id', auth()->user()->role_id)->pluck('permission')->toArray() ,
                // ]);
            });            
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
