<?php

use Illuminate\Support\Facades\Route;
//Auth::LoginUsingId(61);
/*
|--------------------------------------------------------------------------
| WebSite Routes
|--------------------------------------------------------------------------
|
| Here is where you can register website routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//vistiors(auth()->id());

Route::group(['middleware' => ['web' , 'HtmlMinifier']], function () {

    // guest routes
    Route::group(['middleware' => ['guest:station']], function () {
        // login routes
        Route::get('/login'       , 'AuthController@loginPage')->name('login');
        Route::post('/login'      , 'AuthController@login');
        // register routes
        Route::get('/register'    , 'AuthController@registerPage')->name('provider.register');
        Route::post('/register'   , 'AuthController@register');
        // confirm account 
        Route::get('/confirm-phone/{id}', 'AuthController@confirmPage');
        Route::post('/confirm-phone/{id}', 'AuthController@confirm');
        Route::post('/resed-code/{id}', 'AuthController@resendCode');
        // forget password
        Route::get('/forget-password', 'AuthController@forgetPasswordPage');
        Route::post('/forget-password', 'AuthController@forgetPassword');
        Route::get('/reset-password/{id}', 'AuthController@resetPasswordPage');
        Route::post('/reset-password/{id}', 'AuthController@resetPassword');
        
    });
    // guest routes

    // home page
    Route::get('/terms'           , 'HomeController@terms')->name('orders');
    // auth  routes
    Route::group(['middleware' => ['auth:station']], function () {
        Route::get('/dashboard'   , 'HomeController@home')->name('orders');
        // home page
        // accounts
        Route::get('/accounts'    , 'accountController@accounts')->name('accounts');
        // add-account page
        Route::get('/add-account' , 'accountController@addAccountPage')->name('addAccountPage');
        // add-account
        Route::post('/add-account' , 'accountController@addAccount')->name('addAccount');
        // edit-account
        Route::get('/edit-account/{id}' , 'accountController@editAccountPage')->name('editAccountPage');
        // edit-account
        Route::post('/edit-account/{id}', 'accountController@editAccount')->name('editAccount');
        // delete-account
        Route::get('/delete-account/{id}', 'accountController@deleteAccount')->name('deleteAccount');
        // workers
        Route::get('/workers'     , 'workerController@workers')->name('workers');
        // add worker page
        Route::get('/add-worker'  , 'workerController@addWorkerPage');
        // add worker 
        Route::post('/add-worker' , 'workerController@addWorker');
        // delete worker 
        Route::get('/delete-worker/{id}', 'workerController@deleteWorker');
        // edit worker 
        Route::get('/edit-worker/{id}', 'workerController@editWorkerPage');
        // edit worker 
        Route::put('/edit-worker/{id}', 'workerController@editWorker');
        // settings
        Route::get('/settings'    , 'settingController@settings')->name('settings');
        // update settings
        Route::post('/update-settings' , 'settingController@updateSettings')->name('updateSettings');
        // update settings
        Route::get('/notifications' , 'settingController@notifications')->name('notifications');
        // logout
        Route::get('/logout'      , 'AuthController@logout')->name('logout');
    });
    // auth  routes

});








