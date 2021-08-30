<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/provider/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/provider/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/provider/css/style.css')}}">
    <title>{{__('site.terms')}}</title>
</head>
<body>

<div class="loader">
    <img src="{{asset('provider/images/logo.png')}}">
</div>
<section id="login" class="login-paper">
    <div style="padding-top: 110px">
        <div class="container overflow-hidden">
            <div class="add-form fadedown2">
                <div style="padding-bottom: 100px" class="row flex-column align-items-center">
                    <img src="images/logohead.png" alt="logoLogin">
                    <h2 class="text-center">{{__('site.terms')}}</h2>
                    <div class="tex-terms">
                        <p>{{$terms['terms_'.lang()]}}</p>
                    </div>
                    <div class="col-sm-4 col-12">
                        <a style="font-weight: 600; line-height: 40px" href="{{url()->previous()}}" class="defult-link add-btn login-btn btn">{{__('site.back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('provider/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('provider/js/popper.min.js')}}"></script>
<script src="{{asset('provider/js/bootstrap.min.js')}}"></script>
<script src="{{asset('provider/js/main.js')}}"></script>
</body>
</html>