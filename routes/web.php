<?php

use Illuminate\Support\Facades\Route;

//Auth::loginUsingId(1) ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Cache-Control, 'max-age=100', Content-Type, Accept");
header("Access-Control-Allow-Headers: Cache-Control, max-age=31536000");

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/lang/{lang}'                 , 'AuthController@SetLanguage');

    Route::get('login', 'AuthController@showLoginForm')->name('show.login');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('getCities', 'CityController@getCities')->name('getCities');



    Route::group(['middleware' => ['admin', 'check-role','admin-lang']], function () {

        /*------------ start Of Dashboard----------*/
            Route::get('dashboard', [
                'uses'      => 'HomeController@dashboard',
                'as'        => 'dashboard',
                'icon'      => '<i class="la la-home"></i>',
                'title'     => 'الرئيسيه',
                'type'      => 'parent'
            ]);
        /*------------ end Of Dashboard----------*/

        /*------------ intros----------*/
            Route::get('intros', [
                'uses'      => 'IntroController@index',
                'as'        => 'intros.index',
                'title'     => 'بنرات المقدمة',
                'icon'      => '<i class="la la-image"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['intros.store', 'intros.update', 'intros.delete' , 'intros.deleteAll',]
            ]);

            # intros store
            Route::post('intros/store', [
                'uses'  => 'IntroController@store',
                'as'    => 'intros.store',
                'title' => ' اضافة بنر'
            ]);

            # intros update
            Route::put('intros/{id}', [
                'uses'  => 'IntroController@update',
                'as'    => 'intros.update',
                'title' => 'تحديث بنر'
            ]);

            # intros delete
            Route::delete('intros/{id}', [
                'uses'  => 'IntroController@destroy',
                'as'    => 'intros.delete',
                'title' => 'حذف بنر'
            ]);
            #delete all 
            Route::post('delete-all-intros', [
                'uses'  => 'IntroController@destroyAll',
                'as'    => 'intros.deleteAll',
                'title' => 'حذف مجموعه من البنرات'
            ]);
        /*------------ #intros----------*/

        /*------------ start Of intro site  ----------*/
            Route::get('intro-site', [
                'as'        => 'intro_site',
                'icon'      => '<i class="la la-image"></i>',
                'title'     => 'الموقع التعريفي',
                'type'      => 'parent',
                'sub_route' => true,
                'child'     => [
                    'intro_settings.index','introsliders.index','introsliders.store', 'introsliders.update', 'introsliders.delete' ,'introsliders.deleteAll',
                    'introservices.index','introservices.store', 'introservices.update', 'introservices.delete' ,'introservices.deleteAll',
                    'introfqscategories.index','introfqscategories.store', 'introfqscategories.update', 'introfqscategories.delete' ,'introfqscategories.deleteAll' ,
                    'introfqs.index','introfqs.store', 'introfqs.update', 'introfqs.delete' ,'introfqs.deleteAll',
                    'introparteners.index','introparteners.store', 'introparteners.update', 'introparteners.delete' ,'introparteners.deleteAll' ,
                    'intromessages.index', 'intromessages.delete' ,'intromessages.deleteAll',
                    'introsocials.index','introsocials.store', 'introsocials.update', 'introsocials.delete' ,'introsocials.deleteAll',
                    'introhowworks.index','introhowworks.store', 'introhowworks.update', 'introhowworks.delete' ,'introhowworks.deleteAll',
                ]
            ]);

            Route::get('intro-settings', [
                'uses'      => 'IntroSetting@index',
                'as'        => 'intro_settings.index',
                'title'     => 'اعدادات الموقع التعريفي',
                'icon'      => '<i class="ft-settings icon-left"></i>',
            ]);

            /*------------ start Of introsliders ----------*/
                Route::get('introsliders', [
                    'uses'      => 'IntroSliderController@index',
                    'as'        => 'introsliders.index',
                    'title'     => 'بنرات الاسلايدر',
                    'icon'      => '<i class="la la-image"></i>',
                ]);

                # introsliders store
                Route::post('introsliders/store', [
                    'uses'  => 'IntroSliderController@store',
                    'as'    => 'introsliders.store',
                    'title' => ' اضافة بنر'
                ]);

                # introsliders update
                Route::put('introsliders/{id}', [
                    'uses'  => 'IntroSliderController@update',
                    'as'    => 'introsliders.update',
                    'title' => 'تحديث بنر'
                ]);

                # introsliders delete
                Route::delete('introsliders/{id}', [
                    'uses'  => 'IntroSliderController@destroy',
                    'as'    => 'introsliders.delete',
                    'title' => 'حذف بنر'
                ]);

                #delete all introsliders
                Route::post('delete-all-introsliders', [
                    'uses'  => 'IntroSliderController@destroyAll',
                    'as'    => 'introsliders.deleteAll',
                    'title' => 'حذف مجموعه من بنرات'
                ]);
            /*------------ end Of introsliders ----------*/

            /*------------ start Of introservices ----------*/
                Route::get('introservices', [
                    'uses'      => 'IntroServiceController@index',
                    'as'        => 'introservices.index',
                    'title'     => 'خدماتنا',
                    'icon'      => '<i class="la la-map"></i>',
                ]);

                # introservices store
                Route::post('introservices/store', [
                    'uses'  => 'IntroServiceController@store',
                    'as'    => 'introservices.store',
                    'title' => ' اضافة خدمه'
                ]);

                # introservices update
                Route::put('introservices/{id}', [
                    'uses'  => 'IntroServiceController@update',
                    'as'    => 'introservices.update',
                    'title' => 'تحديث خدمه'
                ]);

                # introservices delete
                Route::delete('introservices/{id}', [
                    'uses'  => 'IntroServiceController@destroy',
                    'as'    => 'introservices.delete',
                    'title' => 'حذف خدمه'
                ]);

                #delete all introservices
                Route::post('delete-all-introservices', [
                    'uses'  => 'IntroServiceController@destroyAll',
                    'as'    => 'introservices.deleteAll',
                    'title' => 'حذف مجموعه من خدماتنا'
                ]);
            /*------------ end Of introservices ----------*/

            /*------------ start Of introfqscategories ----------*/
                Route::get('introfqscategories', [
                    'uses'      => 'IntroFqsCategoryController@index',
                    'as'        => 'introfqscategories.index',
                    'title'     => 'اقسام الاسئله الشائعة',
                    'icon'      => '<i class="la la-list"></i>',
                ]);

                # introfqscategories store
                Route::post('introfqscategories/store', [
                    'uses'  => 'IntroFqsCategoryController@store',
                    'as'    => 'introfqscategories.store',
                    'title' => ' اضافة سؤال'
                ]);

                # introfqscategories update
                Route::put('introfqscategories/{id}', [
                    'uses'  => 'IntroFqsCategoryController@update',
                    'as'    => 'introfqscategories.update',
                    'title' => 'تحديث سؤال'
                ]);

                # introfqscategories delete
                Route::delete('introfqscategories/{id}', [
                    'uses'  => 'IntroFqsCategoryController@destroy',
                    'as'    => 'introfqscategories.delete',
                    'title' => 'حذف سؤال'
                ]);

                #delete all introfqscategories
                Route::post('delete-all-introfqscategories', [
                    'uses'  => 'IntroFqsCategoryController@destroyAll',
                    'as'    => 'introfqscategories.deleteAll',
                    'title' => 'حذف مجموعه من اسئله شائعة'
                ]);
            /*------------ end Of introfqscategories ----------*/

            /*------------ start Of introfqs ----------*/
                Route::get('introfqs', [
                    'uses'      => 'IntroFqsController@index',
                    'as'        => 'introfqs.index',
                    'title'     => 'الاسئله الشائعه',
                    'icon'      => '<i class="la la-bullhorn"></i>',
                ]);

                # introfqs store
                Route::post('introfqs/store', [
                    'uses'  => 'IntroFqsController@store',
                    'as'    => 'introfqs.store',
                    'title' => ' اضافة سؤال'
                ]);

                # introfqs update
                Route::put('introfqs/{id}', [
                    'uses'  => 'IntroFqsController@update',
                    'as'    => 'introfqs.update',
                    'title' => 'تحديث سؤال'
                ]);

                # introfqs delete
                Route::delete('introfqs/{id}', [
                    'uses'  => 'IntroFqsController@destroy',
                    'as'    => 'introfqs.delete',
                    'title' => 'حذف سؤال'
                ]);

                #delete all introfqs
                Route::post('delete-all-introfqs', [
                    'uses'  => 'IntroFqsController@destroyAll',
                    'as'    => 'introfqs.deleteAll',
                    'title' => 'حذف مجموعه من الاسئله الشائعه'
                ]);
            /*------------ end Of introfqs ----------*/
            
            /*------------ start Of introparteners ----------*/
                Route::get('introparteners', [
                    'uses'      => 'IntroPartenerController@index',
                    'as'        => 'introparteners.index',
                    'title'     => 'شركاء النجاح',
                    'icon'      => '<i class="la la-list"></i>',
                ]);

                # introparteners store
                Route::post('introparteners/store', [
                    'uses'  => 'IntroPartenerController@store',
                    'as'    => 'introparteners.store',
                    'title' => ' اضافة شريك'
                ]);

                # introparteners update
                Route::put('introparteners/{id}', [
                    'uses'  => 'IntroPartenerController@update',
                    'as'    => 'introparteners.update',
                    'title' => 'تحديث شريك'
                ]);

                # introparteners delete
                Route::delete('introparteners/{id}', [
                    'uses'  => 'IntroPartenerController@destroy',
                    'as'    => 'introparteners.delete',
                    'title' => 'حذف شريك'
                ]);

                #delete all introparteners
                Route::post('delete-all-introparteners', [
                    'uses'  => 'IntroPartenerController@destroyAll',
                    'as'    => 'introparteners.deleteAll',
                    'title' => 'حذف مجموعه من شركاء النجاح'
                ]);
            /*------------ end Of introparteners ----------*/

            /*------------ start Of intromessages ----------*/
                Route::get('intromessages', [
                    'uses'      => 'IntroMessagesController@index',
                    'as'        => 'intromessages.index',
                    'title'     => 'رسائل العملاء',
                    'icon'      => '<i class="la la-envelope-square"></i>',
                ]);

                # intromessages delete
                Route::delete('intromessages/{id}', [
                    'uses'  => 'IntroMessagesController@destroy',
                    'as'    => 'intromessages.delete',
                    'title' => 'حذف رسالة'
                ]);

                #delete all intromessages
                Route::post('delete-all-intromessages', [
                    'uses'  => 'IntroMessagesController@destroyAll',
                    'as'    => 'intromessages.deleteAll',
                    'title' => 'حذف مجموعه من رسائل العملاء'
                ]);
            /*------------ end Of intromessages ----------*/

            /*------------ start Of introsocials ----------*/
                Route::get('introsocials', [
                    'uses'      => 'IntroSocialController@index',
                    'as'        => 'introsocials.index',
                    'title'     => 'وسائل التواصل',
                    'icon'      => '<i class="la la-facebook"></i>',
                ]);

                # introsocials store
                Route::post('introsocials/store', [
                    'uses'  => 'IntroSocialController@store',
                    'as'    => 'introsocials.store',
                    'title' => ' اضافة وسيلة'
                ]);

                # introsocials update
                Route::put('introsocials/{id}', [
                    'uses'  => 'IntroSocialController@update',
                    'as'    => 'introsocials.update',
                    'title' => 'تحديث وسيلة'
                ]);

                # introsocials delete
                Route::delete('introsocials/{id}', [
                    'uses'  => 'IntroSocialController@destroy',
                    'as'    => 'introsocials.delete',
                    'title' => 'حذف وسيلة'
                ]);

                #delete all introsocials
                Route::post('delete-all-introsocials', [
                    'uses'  => 'IntroSocialController@destroyAll',
                    'as'    => 'introsocials.deleteAll',
                    'title' => 'حذف مجموعه من وسائل التواصل'
                ]);
            /*------------ end Of introsocials ----------*/

            /*------------ start Of introhowworks ----------*/
                Route::get('introhowworks', [
                    'uses'      => 'IntroHowWorkController@index',
                    'as'        => 'introhowworks.index',
                    'title'     => 'كيف نعمل',
                    'icon'      => '<i class="la la-calendar-check-o"></i>',
                ]);

                # introhowworks store
                Route::post('introhowworks/store', [
                    'uses'  => 'IntroHowWorkController@store',
                    'as'    => 'introhowworks.store',
                    'title' => ' اضافة خطوه'
                ]);

                # introhowworks update
                Route::put('introhowworks/{id}', [
                    'uses'  => 'IntroHowWorkController@update',
                    'as'    => 'introhowworks.update',
                    'title' => 'تحديث خطوه'
                ]);

                # introhowworks delete
                Route::delete('introhowworks/{id}', [
                    'uses'  => 'IntroHowWorkController@destroy',
                    'as'    => 'introhowworks.delete',
                    'title' => 'حذف خطوه'
                ]);

                #delete all introhowworks
                Route::post('delete-all-introhowworks', [
                    'uses'  => 'IntroHowWorkController@destroy',
                    'as'    => 'introhowworks.deleteAll',
                    'title' => 'حذف مجموعه من كيف نعمل'
                ]);
            /*------------ end Of introhowworks ----------*/
            
        /*------------ end Of intro site ----------*/
        
        /*------------ start Of countries ----------*/
            Route::get('countries', [
                'uses'      => 'CountryController@index',
                'as'        => 'countries.index',
                'title'     => 'اكواد الدول',
                'icon'      => '<i class="la la-flag"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'countries.store', 'countries.update', 'countries.delete' ,'countries.deleteAll']
            ]);

            # countries store
            Route::post('countries/store', [
                'uses'  => 'CountryController@store',
                'as'    => 'countries.store',
                'title' => ' اضافة كود'
            ]);

            # countries update
            Route::put('countries/{id}', [
                'uses'  => 'CountryController@update',
                'as'    => 'countries.update',
                'title' => 'تحديث كود'
            ]);

            # countries delete
            Route::delete('countries/{id}', [
                'uses'  => 'CountryController@destroy',
                'as'    => 'countries.delete',
                'title' => 'حذف كود'
            ]);

            #delete all countries
            Route::post('delete-all-countries', [
                'uses'  => 'CountryController@destroyAll',
                'as'    => 'countries.deleteAll',
                'title' => 'حذف مجموعه من اكواد الدول'
            ]);
        /*------------ end Of countries ----------*/

        /*------------ start Of cities ----------*/
            Route::get('cities', [
                'uses'      => 'CityController@index',
                'as'        => 'cities.index',
                'title'     => 'مدن',
                'icon'      => '<i class="la la-location-arrow"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'cities.store', 'cities.update', 'cities.delete' , 'cities.deleteAll',]
            ]);

            # cities store
            Route::post('cities/store', [
                'uses'  => 'CityController@store',
                'as'    => 'cities.store',
                'title' => ' اضافة مدينة'
            ]);

            # cities update
            Route::put('cities/{id}', [
                'uses'  => 'CityController@update',
                'as'    => 'cities.update',
                'title' => 'تحديث مدينة'
            ]);

            # cities delete
            Route::delete('cities/{id}', [
                'uses'  => 'CityController@destroy',
                'as'    => 'cities.delete',
                'title' => 'حذف مدينة'
            ]);

            #delete all 
            Route::post('delete-all-cities', [
                'uses'  => 'CityController@destroyAll',
                'as'    => 'cities.deleteAll',
                'title' => 'حذف مجموعه من المدن'
            ]);
        /*------------ end Of cities ----------*/

        /*------------ start Of users Controller ----------*/
            Route::get('users', [
                'as'        => 'users',
                'icon'      => '<i class="la la-users"></i>',
                'title'     => 'المستخدمين',
                'type'      => 'parent',
                'sub_route' => true,
                'child'     => [
                                'admins.update_profile','admins.index', 'admins.store', 'admins.update','admins.edit', 'admins.delete','admins.deleteAll',
                                'clients.index', 'clients.store', 'clients.update', 'clients.delete' ,'clients.notify' , 'clients.deleteAll' ,
                                'stations.index','stations.store', 'stations.update', 'stations.delete', 'stations.deleteAll',
                                'workers.index','workers.store', 'workers.update', 'workers.delete' , 'workers.deleteAll',
                                ]
                            ]);

            /************ Admins ************/
                #show
                Route::get('admins/{id}/edit', [
                    'uses'  => 'AdminController@edit',
                    'as'    => 'admins.edit',
                    'title' => 'عرض الملف الشخصي'
                ]);

                #update profile
                Route::put('admins/update-profile/{id}', [
                    'uses'  => 'AdminController@updateProfile',
                    'as'    => 'admins.update_profile',
                    'title' =>  'تعديل الملف الشخصي'
                ]);

                #index
                Route::get('admins', [
                    'uses'  => 'AdminController@index',
                    'as'    => 'admins.index',
                    'title' => 'المشرفين',
                    'icon'  => '<i class="la la-user-secret"></i>',

                ]);

                #store
                Route::post('admins/store', [
                    'uses'  => 'AdminController@store',
                    'as'    => 'admins.store',
                    'title' => 'اضافة مشرف'
                ]);

                #update
                Route::put('admins/{id}', [
                    'uses'  => 'AdminController@update',
                    'as'    => 'admins.update',
                    'title' => 'تعديل مشرف'
                ]);

                #delete
                Route::delete('admins/{id}', [
                    'uses'  => 'AdminController@destroy',
                    'as'    => 'admins.delete',
                    'title' => 'حذف مشرف'
                ]);

                #delete
                Route::post('delete-all-admins', [
                    'uses'  => 'AdminController@destroyAll',
                    'as'    => 'admins.deleteAll',
                    'title' => 'حذف مجموعه من المشرفين'
                ]);

            /************ #Admins ************/

            /************ Clients ************/
                #index
                Route::get('clients', [
                    'uses'  => 'ClientController@index',
                    'as'    => 'clients.index',
                    'title' => 'العملاء',
                    'icon'  => '<i class="la la-user"></i>',

                ]);
                #store
                Route::post('clients/store', [
                    'uses'  => 'ClientController@store',
                    'as'    => 'clients.store',
                    'title' => 'اضافة عميل'
                ]);

                #update
                Route::put('clients/{id}', [
                    'uses'  => 'ClientController@update',
                    'as'    => 'clients.update',
                    'title' => 'تعديل عميل'
                ]);

                #delete
                Route::delete('clients/{id}', [
                    'uses'  => 'ClientController@destroy',
                    'as'    => 'clients.delete',
                    'title' => 'حذف عميل'
                ]);

                #delete
                Route::post('delete-all-clients', [
                    'uses'  => 'ClientController@destroyAll',
                    'as'    => 'clients.deleteAll',
                    'title' => 'حذف مجموعه من العملاء'
                ]);

                #notify
                Route::post('admins/clients/notify', [
                    'uses'  => 'ClientController@notify',
                    'as'    => 'clients.notify',
                    'title' => 'ارسال اشعار للعملاء'
                ]);
            /************ #Clients ************/

            /*------------ start Of stations ----------*/
                Route::get('stations', [
                    'uses'      => 'StationController@index',
                    'as'        => 'stations.index',
                    'title'     => 'بنزينات',
                    'icon'      => '<i class="la la-forumbee"></i>',
                ]);

                # stations store
                Route::post('stations/store', [
                    'uses'  => 'StationController@store',
                    'as'    => 'stations.store',
                    'title' => ' اضافة بنزينة'
                ]);

                # stations update
                Route::put('stations/{id}', [
                    'uses'  => 'StationController@update',
                    'as'    => 'stations.update',
                    'title' => 'تحديث بنزينة'
                ]);

                # stations delete
                Route::delete('stations/{id}', [
                    'uses'  => 'StationController@destroy',
                    'as'    => 'stations.delete',
                    'title' => 'حذف بنزينة'
                ]);

                 #delete all 
                 Route::post('delete-all-stations', [
                    'uses'  => 'StationController@destroyAll',
                    'as'    => 'stations.deleteAll',
                    'title' => 'حذف مجموعه من البنزينات'
                ]);
            /*------------ end Of stations ----------*/

            /*------------ start Of workers ----------*/
                Route::get('workers', [
                    'uses'      => 'WorkerController@index',
                    'as'        => 'workers.index',
                    'title'     => 'عمال',
                    'icon'      => '<i class="la la-male"></i>',
                ]);

                # workers store
                Route::post('workers/store', [
                    'uses'  => 'WorkerController@store',
                    'as'    => 'workers.store',
                    'title' => ' اضافة عامل'
                ]);

                # workers update
                Route::put('workers/{id}', [
                    'uses'  => 'WorkerController@update',
                    'as'    => 'workers.update',
                    'title' => 'تحديث عامل'
                ]);

                # workers delete
                Route::delete('workers/{id}', [
                    'uses'  => 'WorkerController@destroy',
                    'as'    => 'workers.delete',
                    'title' => 'حذف عامل'
                ]);

                #delete all 
                Route::post('delete-all-workers', [
                    'uses'  => 'WorkerController@destroyAll',
                    'as'    => 'workers.deleteAll',
                    'title' => 'حذف مجموعه من العمال'
                ]);
            /*------------ end Of workers ----------*/
        /*------------ end Of users Controller ----------*/

        /*------------ start Of packages ----------*/
            Route::get('packages', [
                'uses'      => 'PackageController@index',
                'as'        => 'packages.index',
                'title'     => 'باقات',
                'icon'      => '<i class="la la-money"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'packages.store', 'packages.update', 'packages.deleteAll', 'packages.delete']
            ]);

            # packages store
            Route::post('packages/store', [
                'uses'  => 'PackageController@store',
                'as'    => 'packages.store',
                'title' => ' اضافة باقة'
            ]);

            # packages update
            Route::put('packages/{id}', [
                'uses'  => 'PackageController@update',
                'as'    => 'packages.update',
                'title' => 'تحديث باقة'
            ]);

            # packages delete
            Route::delete('packages/{id}', [
                'uses'  => 'PackageController@destroy',
                'as'    => 'packages.delete',
                'title' => 'حذف باقة'
            ]);

            #delete
            Route::post('delete-all-packages', [
                'uses'  => 'PackageController@destroyAll',
                'as'    => 'packages.deleteAll',
                'title' => 'حذف مجموعه من الباقات'
            ]);
        /*------------ end Of packages ----------*/

        /*------------ start Of fuels ----------*/
            Route::get('fuels', [
                'uses'      => 'FuelController@index',
                'as'        => 'fuels.index',
                'title'     => 'الوقود',
                'icon'      => '<i class="la la-car"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'fuels.store', 'fuels.update', 'fuels.delete' ,'fuels.deleteAll']
            ]);

            # fuels store
            Route::post('fuels/store', [
                'uses'  => 'FuelController@store',
                'as'    => 'fuels.store',
                'title' => ' اضافة وقود'
            ]);

            # fuels update
            Route::put('fuels/{id}', [
                'uses'  => 'FuelController@update',
                'as'    => 'fuels.update',
                'title' => 'تحديث وقود'
            ]);

            # fuels delete
            Route::delete('fuels/{id}', [
                'uses'  => 'FuelController@destroy',
                'as'    => 'fuels.delete',
                'title' => 'حذف وقود'
            ]);

            #delete all fuels
            Route::post('delete-all-fuels', [
                'uses'  => 'FuelController@destroy',
                'as'    => 'fuels.deleteAll',
                'title' => 'حذف مجموعه من الوقود'
            ]);
        /*------------ end Of fuels ----------*/

        /*------------ start Of orders ----------*/
            Route::get('orders', [
                'uses'      => 'OrderController@index',
                'as'        => 'orders.index',
                'title'     => 'الطلبات',
                'icon'      => '<i class="la la-cart-arrow-down"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'orders.store', 'orders.update', 'orders.delete' ,'orders.deleteAll']
            ]);

            # orders store
            Route::post('orders/store', [
                'uses'  => 'OrderController@store',
                'as'    => 'orders.store',
                'title' => ' اضافة طلب'
            ]);

            # orders update
            Route::put('orders/{id}', [
                'uses'  => 'OrderController@update',
                'as'    => 'orders.update',
                'title' => 'تحديث طلب'
            ]);

            # orders delete
            Route::delete('orders/{id}', [
                'uses'  => 'OrderController@destroy',
                'as'    => 'orders.delete',
                'title' => 'حذف طلب'
            ]);

            #delete all orders
            Route::post('delete-all-orders', [
                'uses'  => 'OrderController@destroy',
                'as'    => 'orders.deleteAll',
                'title' => 'حذف مجموعه من الطلبات'
            ]);
        /*------------ end Of orders ----------*/

        /*------------ start Of banks ----------*/
            Route::get('banks', [
                'uses'      => 'BankController@index',
                'as'        => 'banks.index',
                'title'     => 'البنوك',
                'icon'      => '<i class="la la-bank"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'banks.store', 'banks.update', 'banks.delete' ,'banks.deleteAll',]
            ]);

            # banks store
            Route::post('banks/store', [
                'uses'  => 'BankController@store',
                'as'    => 'banks.store',
                'title' => ' اضافة بنك'
            ]);

            # banks update
            Route::put('banks/{id}', [
                'uses'  => 'BankController@update',
                'as'    => 'banks.update',
                'title' => 'تحديث بنك'
            ]);

            # banks delete
            Route::delete('banks/{id}', [
                'uses'  => 'BankController@destroy',
                'as'    => 'banks.delete',
                'title' => 'حذف بنك'
            ]);

            #delete all banks
            Route::post('delete-all-banks', [
                'uses'  => 'BankController@destroy',
                'as'    => 'banks.deleteAll',
                'title' => 'حذف مجموعه من البنوك'
            ]);
        /*------------ end Of banks ----------*/

        /*------------ start Of transfers ----------*/
            Route::get('transfers', [
                'uses'      => 'TransferController@index',
                'as'        => 'transfers.index',
                'title'     => 'الحولات البنكية',
                'icon'      => '<i class="la la-money"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['transfers.accept','transfers.delete' ,'transfers.deleteAll']
            ]);
            
            # transfers update
            Route::get('transfers/accept/{id}/{type}', [
                'uses'  => 'TransferController@accept',
                'as'    => 'transfers.accept',
                'title' => 'قبول ورفض حوالة'
            ]);

            # transfers delete
            Route::delete('transfers/{id}', [
                'uses'  => 'TransferController@destroy',
                'as'    => 'transfers.delete',
                'title' => 'حذف حوالة'
            ]);

            #delete all transfers
            Route::post('delete-all-transfers', [
                'uses'  => 'TransferController@destroy',
                'as'    => 'transfers.deleteAll',
                'title' => 'حذف مجموعه من الحولات البنكية'
            ]);
        /*------------ end Of transfers ----------*/
        
        /*------------ start Of images ----------*/
            Route::get('images', [
                'uses'      => 'ImageController@index',
                'as'        => 'images.index',
                'title'     => 'البنرات',
                'icon'      => '<i class="la la-image"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'images.store', 'images.update', 'images.delete' ,'images.deleteAll']
            ]);

            # images store
            Route::post('images/store', [
                'uses'  => 'ImageController@store',
                'as'    => 'images.store',
                'title' => ' اضافة بنر'
            ]);

            # images update
            Route::put('images/{id}', [
                'uses'  => 'ImageController@update',
                'as'    => 'images.update',
                'title' => 'تحديث بنر'
            ]);

            # images delete
            Route::delete('images/{id}', [
                'uses'  => 'ImageController@destroy',
                'as'    => 'images.delete',
                'title' => 'حذف بنر'
            ]);

            #delete all images
            Route::post('delete-all-images', [
                'uses'  => 'ImageController@destroyAll',
                'as'    => 'images.deleteAll',
                'title' => 'حذف مجموعه من البنرات'
            ]);
        /*------------ end Of images ----------*/

        /*------------ start Of complaints ----------*/
            Route::get('all-complaints', [
                'as'        => 'all_complaints',
                'icon'      => '<i class="la la-bullhorn"></i>',
                'title'     => 'الشكاوي والمقترحات',
                'type'      => 'parent',
                'sub_route' => true,
                'child'     => [
                    'complaints.WorkerIndex','complaints.UserIndex','complaints.store', 'complaints.update', 'complaints.delete' ,'complaints.deleteAll',
                ]
            ]);
            Route::get('complaints/user', [
                'uses'      => 'ComplaintController@UserIndex',
                'as'        => 'complaints.UserIndex',
                'title'     => 'شكاوي المستخدمين',
                'icon'      => '<i class="la la-bullhorn"></i>',
            ]);
            Route::get('complaints/worker', [
                'uses'      => 'ComplaintController@WorkerIndex',
                'as'        => 'complaints.WorkerIndex',
                'title'     => 'شكاوي العمال',
                'icon'      => '<i class="la la-bullhorn"></i>',
            ]);

            # complaints store
            Route::post('complaints/store', [
                'uses'  => 'ComplaintController@store',
                'as'    => 'complaints.store',
                'title' => ' اضافة شكوي'
            ]);

            # complaints update
            Route::put('complaints/{id}', [
                'uses'  => 'ComplaintController@update',
                'as'    => 'complaints.update',
                'title' => 'تحديث شكوي'
            ]);

            # complaints delete
            Route::delete('complaints/{id}', [
                'uses'  => 'ComplaintController@destroy',
                'as'    => 'complaints.delete',
                'title' => 'حذف شكوي'
            ]);

            #delete all complaints
            Route::post('delete-all-complaints', [
                'uses'  => 'ComplaintController@destroyAll',
                'as'    => 'complaints.deleteAll',
                'title' => 'حذف مجموعه من الشكاوي'
            ]);
        /*------------ end Of complaints ----------*/

        /*------------ start Of messages ----------*/
            Route::get('messages', [
                'uses'      => 'MessageController@index',
                'as'        => 'messages.index',
                'title'     => 'رسائل التواصل',
                'icon'      => '<i class="la la-wechat"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'messages.delete' ,'messages.deleteAll']
            ]);

            
            # messages delete
            Route::delete('messages/{id}', [
                'uses'  => 'MessageController@destroy',
                'as'    => 'messages.delete',
                'title' => 'حذف رساله'
            ]);

            #delete all messages
            Route::post('delete-all-messages', [
                'uses'  => 'MessageController@destroyAll',
                'as'    => 'messages.deleteAll',
                'title' => 'حذف مجموعه من رسائل'
            ]);
        /*------------ end Of messages ----------*/

        // /*------------ start Of seos ----------*/
        //      Route::get('seos', [
        //          'uses'      => 'SeoController@index',
        //          'as'        => 'seos.index',
        //          'title'     => 'سيو',
        //          'icon'      => '<i class="la la-google"></i>',
        //          'type'      => 'parent',
        //          'sub_route' => false,
        //          'child'     => [ 'seos.store', 'seos.update', 'seos.delete' , 'seos.deleteAll']
        //      ]);

        //      #store
        //      Route::post('seos/store', [
        //          'uses'  => 'SeoController@store',
        //          'as'    => 'seos.store',
        //          'title' => ' اضافة سيو'
        //      ]);

        //      #update
        //      Route::put('seos/{id}', [
        //          'uses'  => 'SeoController@update',
        //          'as'    => 'seos.update',
        //          'title' => 'تحديث سيو'
        //      ]);

        //      #deletّe
        //      Route::delete('seos/{id}', [
        //          'uses'  => 'SeoController@destroy',
        //          'as'    => 'seos.delete',
        //          'title' => 'حذف سيو'
        //      ]);
        //     #delete
        //     Route::post('delete-all-seos', [
        //         'uses'  => 'SeoController@destroyAll',
        //         'as'    => 'seos.deleteAll',
        //         'title' => 'حذف مجموعه من السيو'
        //     ]);
        // /*------------ end Of seos ----------*/

        // /*------------ start Of statistics ----------*/
        //     Route::get('statistics', [
        //         'uses'      => 'StatisticsController@index',
        //         'as'        => 'statistics.index',
        //         'title'     => 'الاحصائيات',
        //         'icon'      => '<i class="la la-bar-chart-o"></i>',
        //         'type'      => 'parent',
        //         'sub_route' => []
        //     ]);
        // /*------------ end Of statistics ----------*/

        /*------------ start Of Roles----------*/
            Route::get('roles', [
                'uses'      => 'RoleController@index',
                'as'        => 'roles.index',
                'title'     => 'قائمة الصلاحيات',
                'icon'      => '<i class="la la-eye"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.delete']
            ]);

            #add role page
            Route::get('roles/create', [
                'uses'  => 'RoleController@create',
                'as'    => 'roles.create',
                'title' => 'اضافة صلاحيه',

            ]);

            #store role
            Route::post('roles/store', [
                'uses' => 'RoleController@store',
                'as' => 'roles.store',
                'title' => 'تمكين اضافة صلاحيه'
            ]);

            #edit role page
            Route::get('roles/{id}/edit', [
                'uses' => 'RoleController@edit',
                'as' => 'roles.edit',
                'title' => 'تعديل صلاحيه'
            ]);

            #update role
            Route::put('roles/{id}', [
                'uses' => 'RoleController@update',
                'as' => 'roles.update',
                'title' => 'تمكين تعديل صلاحيه'
            ]);

            #delete role
            Route::delete('roles/{id}', [
                'uses' => 'RoleController@destroy',
                'as' => 'roles.delete',
                'title' => 'حذف صلاحيه'
            ]);
        /*------------ end Of Roles----------*/

        /*------------ start Of socials ----------*/
            Route::get('socials', [
                'uses'      => 'SocialController@index',
                'as'        => 'socials.index',
                'title'     => 'وسائل التواصل',
                'icon'      => '<i class="la la-facebook-f"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => [ 'socials.store', 'socials.update', 'socials.delete' ,'socials.deleteAll']
            ]);

            # socials store
            Route::post('socials/store', [
                'uses'  => 'SocialController@store',
                'as'    => 'socials.store',
                'title' => ' اضافة تواصل'
            ]);

            # socials update
            Route::put('socials/{id}', [
                'uses'  => 'SocialController@update',
                'as'    => 'socials.update',
                'title' => 'تحديث تواصل'
            ]);

            # socials delete
            Route::delete('socials/{id}', [
                'uses'  => 'SocialController@destroy',
                'as'    => 'socials.delete',
                'title' => 'حذف تواصل'
            ]);

            #delete all socials
            Route::post('delete-all-socials', [
                'uses'  => 'SocialController@destroyAll',
                'as'    => 'socials.deleteAll',
                'title' => 'حذف مجموعه من وسائل التواصل'
            ]);
        /*------------ end Of socials ----------*/

        /*------------ start Of Settings ----------*/
            Route::get('settings', [
                'uses'      => 'SettingController@index',
                'as'        => 'settings.index',
                'title'     => 'الاعدادات',
                'icon'      => '<i class="ft-settings icon-left"></i>',
                'type'      => 'parent',
                'sub_route' => false,
                'child'     => ['settings.update','settings.message.all','settings.message.one','settings.send_email']
            ]);

            #update
            Route::put('settings', [
                'uses' => 'SettingController@update',
                'as' => 'settings.update',
                'title' => 'تحديث الاعدادات'
            ]);

            #message all
            Route::post('settings/{type}/message-all', [
                'uses'  => 'SettingController@messageAll',
                'as'    => 'settings.message.all',
                'title' => 'مراسلة الجميع'
            ])->where('type','email|sms|notification');

            #message one
            Route::post('settings/{type}/message-one', [
                'uses'  => 'SettingController@messageOne',
                'as'    => 'settings.message.one',
                'title' => 'مراسلة مستخدم'
            ])->where('type','email|sms|notification');

            #send email
            Route::post('settings/send-email', [
                'uses'  => 'SettingController@sendEmail',
                'as'    => 'settings.send_email',
                'title' => 'ارسال ايميل'
            ]);
        /*------------ end Of Settings ----------*/
        #new_routes_here
    });
});

// lang route