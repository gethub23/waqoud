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
    <title>{{__('site.login')}}</title>
</head>
<body>

<div class="loader">
    <img src="{{asset('provider/images/logo.png')}}">
</div>

<section id="login" class="login-paper">
    <div style="padding-top: 110px">
        <div class="container overflow-hidden">
            <div class="add-form fadedown2">
                <form action="{{url('provider/login')}}" method="POST" enctype="multipart/form-data" style="padding-bottom: 100px" class="login-form row flex-column align-items-center">
                   @csrf
                    <img src="images/logohead.png" alt="logoLogin">
                    <h2 class="text-center">{{__('site.login')}}</h2>
                    <h5 style="color: #f1790a">{{__('site.enter_date')}}</h5>
                    <div class="form_label col-md-9 col-12 position-relative">
                        <input id="phone" type="number" name="phone" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.phone2')}}</label>
                        <select class="code-num" name="key">
                            @foreach ($keys as $key)
                                <option value="{{$key->key}}">{{$key->key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input id="inp1" type="password" name="password" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.employ_password')}}</label>
                        <img class="showPass" src="images/eyes.png">
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="checkrolls">
                                <input class="mr-1 ml-1" type="checkbox">
                                <span class="checkcustom"><i class="fas fa-check"></i></span>
                                <label class="mb-0">{{__('site.remmber_me')}}</label>
                            </div>
                            <a class="defult-link w-50 text-end" href="{{url('provider/forget-password')}}"><p class="forgitTxt">{{__('site.forgetPass')}}</p></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 mt-4">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 col-12">
                                <button class="add-btn login-btn submit_button">{{__('site.login')}}</button>
                            </div>
                            <div class="col-sm-4 col-12">
                                <a href="{{url('provider/register')}}" class="add-btn register-btn defult-link btn">{{__('site.register')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('provider/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('provider/js/popper.min.js')}}"></script>
<script src="{{asset('provider/js/bootstrap.min.js')}}"></script>
<script src="{{asset('provider/js/wow.min.js')}}"></script>
<script src="{{asset('provider/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">  new WOW().init(); </script>
<script>
    $(".showPass").mousedown(function() {
        $(this).parent('.form_label').find('#inp1').attr('type', 'text')
    });
    $(".showPass").mouseup(function() {
        $(this).parent('.form_label').find('#inp1').attr('type', 'password')
    });
    $(".showPass").mousedown(function() {
        $(this).parent('.form_label').find('#inp2').attr('type', 'text')
    });
    $(".showPass").mouseup(function() {
        $(this).parent('.form_label').find('#inp2').attr('type', 'password')
    });
</script>
<script>
    $(document).on('submit','.login-form',function(e){
        e.preventDefault();
        var url = $(this).attr('action')
        $.ajax({
            url: url,
            method: 'post',
            data: new FormData($(this)[0]),
            dataType:'json',
            processData: false,
            contentType: false,
            beforeSend: function(){
                $(".submit_button").html('<i class="fas fa-spinner"></i>').attr('disables',true);
            },
            success: function(response){
                $(".submit_button").html("{{__('site.login')}}").attr('disables',false)
                if (response.status == 'login') {
                    toastr.success(response.message)
                    setTimeout(function(){
                        window.location.replace(response.url)
                    }, 1000);
                }else if (response.status == 'activate') {
                    toastr.error(response.message)
                    setTimeout(function(){
                        window.location.replace(response.url)
                    }, 1000);
                }else{
                    toastr.error(response.message)
                }
                
            },
            error: function (xhr) {
                $(".submit_button").html("{{__('site.login')}}").attr('disables',false)
                $('.error_meassages').remove();
                $.each(xhr.responseJSON.errors, function(key,value) {
                    toastr.error(value)
                });
            },
        });

    });
</script>
</body>
</html>