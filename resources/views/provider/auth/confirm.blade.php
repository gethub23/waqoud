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
    <title>{{__('site.code')}}</title>
</head>
<body>

<div class="loader">
    <img src="{{asset('provider/images/logo.png')}}">
</div>

<section id="login" class="login-paper">
    <div style="padding-top: 110px">
        <div class="container overflow-hidden">
            <div class="add-form fadedown2">
                <form enctype="multipart/form-data" method="POST" style="padding-bottom: 100px" action="{{url('provider/confirm-phone/'.$id)}}" class="row flex-column align-items-center confirm-form">
                    @csrf
                    <img src="{{asset('provider/images/logo.png')}}" alt="logoLogin">
                    <h5 style="color: #f1790a ;margin-top:30px ">{{__('site.hi_enter_code')}}</h5>
                    <div class="form_label col-md-9 col-12 position-relative">
                        <input  type="number" name="code" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.code')}}</label>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="checkrolls">
                            </div>
                            <a class="defult-link w-50 text-end resend_code"><p class="forgitTxt">{{__('site.resend_code')}}</p></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 mt-4">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 col-12">
                                <button type="submit" class="add-btn login-btn">{{__('site.send_code')}}</button>
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
    function resize()
    {
        var heights = window.innerHeight;
        document.getElementById("login").style.height = heights + "px";
    }
    resize();
    window.onresize = function() {
        resize();
    };
</script>
<script>
    $(document).on('click','.resend_code',function(e){
        e.preventDefault();
        $.ajax({
            url: '{{url("provider/resed-code/")}}' + '/' + '{{$id}}',
            method: 'post',
            data: {"_token": "{{ csrf_token() }}",},
            dataType:'json',
            success: function(response){
                toastr.success(response.message)
            },
        });
    })
    $(document).on('submit','.confirm-form',function(e){
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
                $(".submit_button").html("{{__('site.register')}}").attr('disables',false)
                if (response.status == 'fail') {
                    toastr.error(response.message)
                }else{
                    toastr.success(response.message)
                    setTimeout(function(){
                        window.location.replace(response.url)
                    }, 1000);
                }
            },
            error: function (xhr) {
                $(".submit_button").html("{{__('site.register')}}").attr('disables',false)
                $('.error_meassages').remove();
                $.each(xhr.responseJSON.errors, function(key,value) {
                    toastr.error(value)
                });
            },
        });

    });
</script>
{{-- #submit form --}}
</body>
</html>