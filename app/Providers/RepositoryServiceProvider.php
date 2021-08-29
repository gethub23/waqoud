<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\ISeo;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\IUser;
use App\Repositories\Interfaces\ISetting;

use App\Repositories\Eloquent\SeoRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\SettingRepository;

use App\Repositories\Interfaces\IIntro;
use App\Repositories\Eloquent\IntroRepository;
use App\Repositories\Interfaces\ICity;
use App\Repositories\Eloquent\CityRepository;
use App\Repositories\Interfaces\IStation;
use App\Repositories\Eloquent\StationRepository;
use App\Repositories\Interfaces\IWorker;
use App\Repositories\Eloquent\WorkerRepository;
use App\Repositories\Interfaces\IPackage;
use App\Repositories\Eloquent\PackageRepository;
use App\Repositories\Interfaces\IBank;
use App\Repositories\Eloquent\BankRepository;
use App\Repositories\Interfaces\ISocial;
use App\Repositories\Eloquent\SocialRepository;
use App\Repositories\Interfaces\IComplaint;
use App\Repositories\Eloquent\ComplaintRepository;
use App\Repositories\Interfaces\IMessage;
use App\Repositories\Eloquent\MessageRepository;
use App\Repositories\Interfaces\IFuel;
use App\Repositories\Eloquent\FuelRepository;
use App\Repositories\Interfaces\ICountry;
use App\Repositories\Eloquent\CountryRepository;
use App\Repositories\Interfaces\ITransfer;
use App\Repositories\Eloquent\TransferRepository;
use App\Repositories\Interfaces\IOrder;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Interfaces\IImage;
use App\Repositories\Eloquent\ImageRepository;
use App\Repositories\Interfaces\IIntroSlider;
use App\Repositories\Eloquent\IntroSliderRepository;
use App\Repositories\Interfaces\IIntroService;
use App\Repositories\Eloquent\IntroServiceRepository;
use App\Repositories\Interfaces\IIntroFqsCategory;
use App\Repositories\Eloquent\IntroFqsCategoryRepository;
use App\Repositories\Interfaces\IIntroFqs;
use App\Repositories\Eloquent\IntroFqsRepository;
use App\Repositories\Interfaces\IIntroPartener;
use App\Repositories\Eloquent\IntroPartenerRepository;
use App\Repositories\Interfaces\IIntroMessages;
use App\Repositories\Eloquent\IntroMessagesRepository;
use App\Repositories\Interfaces\IIntroHowWork;
use App\Repositories\Eloquent\IntroHowWorkRepository;
use App\Repositories\Interfaces\IIntroSocial;
use App\Repositories\Eloquent\IntroSocialRepository;
use App\Repositories\Interfaces\IStationWallet;
use App\Repositories\Eloquent\StationWalletRepository;
use App\Repositories\Interfaces\IStationDue;
use App\Repositories\Eloquent\StationDueRepository;
#clases_Definition_here

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->bind(IIntro::class  , IntroRepository::class   );
        $this->app->bind(ICity::class  , CityRepository::class   );
        $this->app->bind(IStation::class  , StationRepository::class   );
        $this->app->bind(IWorker::class  , WorkerRepository::class   );
        $this->app->bind(IPackage::class  , PackageRepository::class   );
        $this->app->bind(IBank::class  , BankRepository::class   );
        $this->app->bind(ISocial::class  , SocialRepository::class   );
        $this->app->bind(IComplaint::class  , ComplaintRepository::class   );
        $this->app->bind(IMessage::class  , MessageRepository::class   );
        $this->app->bind(IFuel::class  , FuelRepository::class   );
        $this->app->bind(ICountry::class  , CountryRepository::class   );
        $this->app->bind(ITransfer::class  , TransferRepository::class   );
        $this->app->bind(IOrder::class  , OrderRepository::class   );
        $this->app->bind(IImage::class  , ImageRepository::class   );
        $this->app->bind(IIntroSlider::class  , IntroSliderRepository::class   );
        $this->app->bind(IIntroService::class  , IntroServiceRepository::class   );
        $this->app->bind(IIntroFqsCategory::class  , IntroFqsCategoryRepository::class   );
        $this->app->bind(IIntroFqs::class  , IntroFqsRepository::class   );
        $this->app->bind(IIntroPartener::class  , IntroPartenerRepository::class   );
        $this->app->bind(IIntroMessages::class  , IntroMessagesRepository::class   );
        $this->app->bind(IIntroHowWork::class  , IntroHowWorkRepository::class   );
        $this->app->bind(IIntroSocial::class  , IntroSocialRepository::class   );
        $this->app->bind(IStationWallet::class  , StationWalletRepository::class   );
        $this->app->bind(IStationDue::class  , StationDueRepository::class   );
        #connect_here 
        $this->app->bind(ISeo::class                   , SeoRepository::class                  );
        $this->app->bind(IUser::class                  , UserRepository::class                 );
        $this->app->bind(IRole::class                  , RoleRepository::class                 );
        $this->app->bind(ISetting::class               , SettingRepository::class              );

      }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
