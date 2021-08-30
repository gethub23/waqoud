<?php

namespace App\Traits;
use Illuminate\Support\Facades\Route;

trait  routes
{
    function activeUrl ($url){
        if ( \Request::is($url)){
            return 'active';
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


   
}