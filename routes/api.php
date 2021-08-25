<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix'                  => 'v1'  , 'namespace' => 'Api\V1']  , function () {
    Route::group(['middleware'          => ['localization']]                 , function (){
        #auth controller
        // register 
        Route::post('sign-up'                ,'AuthController@signUp'                           );
        Route::post('sign-in'                ,'AuthController@signIn'                           );
        // worker login 
        Route::post('worker-sign-in'         ,'AuthController@WorkersignIn'                     );
        // forget password send code
        Route::post('forget-password'        ,'AuthController@forgetPassword'                   );

        // optional authentication 
        Route::group(['middleware'           => ['jwtOptional','localization']], function (){
            // intros pages 
            Route::get('intros'             ,'IntroController@intros'                           );
            // country phone keys 
            Route::get('country-keys'       ,'PublicController@countryKeys'                     );
            // about app  
            Route::get('about-app'          ,'SettingController@about'                          );
            // app  privacy 
            Route::get('privacy'            ,'SettingController@privacy'                        );
            // app  terms 
            Route::get('terms'              ,'SettingController@terms'                          );
            // contact us page info
            Route::get('contact-us'         ,'SettingController@appInfo'                        );
            // contact us page info
            Route::get('sliders'            ,'PublicController@sliders'                        );
            
        });

        Route::group(['middleware'               => ['jwt']]             , function (){
            // logout
            Route::post('logout'             ,'AuthController@Logout'                          );
            //  reset password
            Route::post('reset-password'     ,'AuthController@resetPassword'                    );
            //  resend activation code
            Route::post('resend-code'        ,'AuthController@resendCode'                       );
            //  activate user account
            Route::post('activate'           ,'AuthController@activate'                         );
            //  profile
            Route::post('profile'            ,'AuthController@profile'                          );
            // banks 
            Route::get('banks'               ,'TransferController@banks'                        );
            // store transfer  
            Route::post('store-transfer'     ,'TransferController@storeTransfer'                );
            // home
            Route::get('home'                ,'PublicController@home'                           );
            // home
            Route::get('packages'            ,'PackageController@packages'                      );
            // profile data
            Route::get('profile'             ,'UserController@profile'                          );
            // update profile data
            Route::post('update-profile'     ,'UserController@updateProfile'                    );
            // edit password 
            Route::post('update-password'    ,'UserController@editPassword'                     );
            // update phone code 
            Route::post('update-phone-code'  ,'UserController@updatePhoneRequest'               );
            // update phone  
            Route::post('update-phone'       ,'UserController@updatePhone'                      );
            // Store Complaint  
            Route::post('send-complaint'     ,'ComplaintController@StoreComplaint'              );
            // send-message  
            Route::post('send-message'       ,'MessageController@sendMessage'                   );
            // fuels type 
            Route::get ('fuels'              ,'FuelController@fuels'                            );
            // orders  
            Route::get ('orders'             ,'OrderController@orders'                          );
            // Notifications  
            Route::get ('notifications'      ,'UserController@notifications'                    );
            // count Notifications  
            Route::get ('count-notifications','UserController@countNotifications'               );
            // count Notifications  
            Route::post('delete-notifications','UserController@deleteNotifications'             );

            // must have subscribe and charge in app middleware
            Route::group(['middleware'               => ['SubscibeCredit']]             , function (){
                // accept order  
                Route::get('accept-order/{id}','OrderController@acceptOrder'                     );
                // finish order  
                Route::get('finish-order/{id}','OrderController@finishOrder'                     );
            });
            // must have subscribe in app middleware
            Route::group(['middleware'               => ['Subscribe']]             , function (){
                // stations 
                Route::get('stations'        ,'StationController@stations'                       );
            });
            // must have charge in app middleware
            Route::group(['middleware'               => ['charge']]             , function (){
                
            });
            // must have charge in app middleware
            Route::group(['middleware'               => ['worker']]             , function (){
                // get user data  
                Route::get('user-data/{id}'      ,'userController@userData'                          );
                // send order request to user  
                Route::post('new-order-request'  ,'OrderController@newOrder'                         );
                // worker Notifications  
                Route::get ('worker/notifications'      ,'WorkerController@notifications'                    );
                // worker count Notifications  
                Route::get ('worker/count-notifications' ,'WorkerController@countNotifications'               );
                // worker count Notifications  
                Route::post('worker/delete-notifications','WorkerController@deleteNotifications'             );
            });
        });

    });

 });
