<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/intro_site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/css/animate.css')}}">
    <!-- plugins CSS -->
    <link rel="stylesheet" href="{{asset('/intro_site/plugins/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/plugins/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/plugins/fancy-box/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('/intro_site/plugins/datepicker/css/datepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- my CSS -->
    <link rel="stylesheet" href="{{asset('intro_site/css/style.css')}}">
    @if (lang() == 'en')
        <link rel="stylesheet" href="{{asset('intro_site/css/style-ltr.css')}}">
    @endif
    <style>
        :root {
            --main: {{$settings['color']}};
            --hover: {{$settings['hover_color']}};
            --main2: linear-gradient(to right bottom, {{$settings['buttons_color']}}, {{$settings['buttons_color']}}, {{$settings['buttons_color']}}, {{$settings['buttons_color']}}, {{$settings['buttons_color']}});
            --white: #ffffff;
            --gray: #777;
        }
    </style>
    <title>{{$settings['intro_name']}}</title>
    <!-- title logo -->
    <link rel="icon"  href="{{$settings['intro_logo']}}" type="image/x-icon" />
</head>