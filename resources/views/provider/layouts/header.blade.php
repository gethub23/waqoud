<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/provider/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/provider/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/provider/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/provider/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
    <!--    <link rel="stylesheet" href="css/styleEn.css">-->
    <title>@yield('title' , __('site.home'))</title>
</head>
<body>

<div class="loader">
    <img src="images/logo.png">
</div>