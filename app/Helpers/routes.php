<?php

namespace App\Traits;
use Illuminate\Support\Facades\Route;

trait  routes
{
    function activeUrl ($url ,$type = 1 ){
        if ( \Request::is($url)){
            return 'color_orange';
        }else{
            if ($type == 2){
                return 'color_off';
            }
            return 'color_wight';
        }
    }

    #current route
    function currentRoute()
    {
        $routes = Route ::getRoutes();
        foreach ( $routes as $value ) {
            if ( $value -> getName() === Route ::currentRouteName() ) {
                echo $value -> getAction()[ 'title' ];
            }
        }
    }


    function isActiveRoute($route, $output = "active"){
        if (Route::currentRouteName() == $route) return $output;
    }
}