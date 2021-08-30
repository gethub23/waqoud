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
    <title>{{__('site.register')}}</title>
</head>
<body>

<div class="loader">
    <img src="{{asset('provider/images/logo.png')}}">
</div>
<section id="login" class="login-paper">
    <div style="padding-top: 110px">
        <div class="container overflow-hidden">
            <div class="add-form fadedown2">
                <form action="{{url('provider/register')}}" method="POST" enctype="multipart/form-data" style="padding-bottom: 100px" class="register-form row flex-column align-items-center">
                    @csrf
                    <img src="images/logohead.png" alt="logoLogin">
                    <h2 class="text-center">{{__('site.register')}}</h2>
                    <h5 style="color: #f1790a">{{__('site.enter_date')}}</h5>
                    <h5 class="mt-4">{{__('site.station_info')}}</h5>
                    <div class="imgs-block">
                        <label class="label-img">
                            <input type="file" name="avatar" id="image" accept="image/*" class="input-img">
                            <img src="images/photo.png">
                        </label>
                        <div class="upload-area">
                        </div>
                    </div>
                    <h5 class="mt-2">{{__('site.station_avatar')}}</h5>
                    <div class="form_label col-md-9 col-12">
                        <input  name="name" type="text" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.station_name')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12 position-relative">
                        <input id="phone" type="tel" class="input_focus addofferinput"  name="phone" required/>
                        <label class="float_label">{{__('site.phone2')}}</label>
                        <select class="code-num" name="key">
                            @foreach ($keys as $key)
                                <option value="{{$key->key}}">{{$key->key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input type="email" name="email" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.email')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input id="inp1" type="password" name="password" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.password')}}</label>
                        <img class="showPass" src="images/eyes.png">
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input id="inp2" type="password" name="password_confirmation" class="input_focus addofferinput" required/>
                        <label class="float_label">{{__('site.confirm_password2')}}</label>
                        <img class="showPass" src="images/eyes.png">
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <select style="height: 75px !important ;" class="input_focus addofferinput" name="city_id">
                            <option value=>{{__('site.choose_city')}}</option>
                            @foreach ($cities as $city)
                                <option  value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="location-change" class="form_label col-md-9 col-12" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <input id="address" name="address"  readonly type="text" class="input_focus addofferinput location" required/>
                        <label style="top: 0;" class="float_label">{{__('site.station_location')}}</label>
                        <a  type="button"  class="location-change"><i class="fas fa-map-marker-alt"></i> </a>
                    </div>
                    <div class="col-md-9 col-12 position-relative">
                        <div class="collapse " id="collapseExample">
                            <div class="card card-body">
                                <input type="hidden" name="latitude" id="latitude" >
                                <input type="hidden" name="longitude" id="longitude">
                                <input type="text" name="searchTextField" id="searchTextField" class="position-absolute form-control" style="top: 10% ; left: 6%; width: 35%;z-index: 20;">
                                <div style="height: 400px;" id='map' class="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <h5 class="mt-4">{{__('site.station_manger_info')}}</h5>
                        <div class="imgs-block">
                            <label class="label-img">
                                <input type="file" name="boss_avatar" id="image1" accept="image/*" class="input-img">
                                <img src="images/photo.png">
                            </label>
                        </div>
                        <h5 class="mt-2">{{__('site.boss_avatar')}}</h5>
                    </div>
                    <div class="add-form">
                        <div class="row flex-column align-items-center">
                            <div class="form_label col-md-9 col-12">
                                <input name="boss_name" type="text" class="input_focus addofferinput" required/>
                                <label class="float_label">{{__('site.boss_name')}}</label>
                            </div>
                            <div class="form_label col-md-9 col-12 position-relative">
                                <input name="boss_phone" type="tel" class="input_focus addofferinput" required/>
                                <label class="float_label">{{__('site.boss_phone')}}</label>
                                <select class="code-num" name="boss_key">
                                    @foreach ($keys as $key)
                                        <option  value="{{$key->key}}">{{$key->key}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form_label col-md-9 col-12">
                                <input  name="boss_identity" type="text" class="input_focus addofferinput" required/>
                                <label class="float_label">{{__('site.boss_identity')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="checkrolls">
                            <input class="mr-1 ml-1" type="checkbox">
                            <span class="checkcustom"><i class="fas fa-check"></i></span>
                            <label class="mb-0">{{__('site.if_register')}} <a href="{{url('provider/terms')}}" class="defult-link" style="color: #ff9206 !important;">{{__('site.terms')}}</a></label>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 mt-4">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 col-12">
                                <button type="submit" class="submit_button add-btn login-btn">{{__('site.register')}}</button>
                            </div>
                            <div class="col-sm-4 col-12">
                                <a href="{{url('provider/login')}}" class="add-btn register-btn defult-link btn">{{__('site.login')}}</a>
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
<script>
    $('.input-img').change(function (event) {
        for (var one = 0; one < event.target.files.length; one++) {
            $(this).parents('.imgs-block').find('.upload-area').append('<div class="uploaded-block" data-count-order="' + one + '"><img src="' + URL.createObjectURL(event.target.files[one]) + '"><button class="close"> <i class="fa fa-times"></i></button></div>');
        }
    });

    $('.imgs-block').on('click', '.close',function (){
        $(this).parents('.uploaded-block').remove();
    });
    $('.image-uploader').change(function (event) {
        for (var one = 0; one < event.target.files.length; one++) {
            $(this).parents('.images-upload-block').find('.upload-area').append('<div class="uploaded-block" data-count-order="' + one + '"><img src="' + URL.createObjectURL(event.target.files[one]) + '"><button class="close">&times;</button></div>');
        }
    });

    $('.images-upload-block').on('click', '.close',function (){
        $(this).parents('.uploaded-block').remove();
        $(".input-img").attr("");
    });
    $(".nav-links a").each(
        function() {
            if (window.location.href.includes($(this).attr('href'))) {
                $(this).parent('li').addClass("active");
            }
        }
    );
</script>
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
</script>{{-- map --}}
<script>
    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });
    function initMap() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (p) {
                var  lat = p.coords.latitude ;
                var  lng = p.coords.longitude;
                const myLatlng = {
                    lat: lat,
                    lng: lng
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 10,
                    center: myLatlng,
                    mapTypeControl: false,
                    streetViewControl: false,
                });
                var input = document.getElementById('searchTextField');
                var autocomplete = new google.maps.places.Autocomplete(input);
                const geocoder = new google.maps.Geocoder();
                
                document.getElementById("searchTextField").addEventListener("keyup", () => {
                    geocodeAddress(geocoder, map);
                });

                document.getElementById("searchTextField").addEventListener("change", () => {
                    geocodeAddress(geocoder, map);
                });

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: map,
                    title: 'Set lat/lon values for this property',
                    draggable: true,
                    streetViewControl: false,
                });

                GetAddress(new google.maps.LatLng( lat, lng))
                $('#latitude').val(lat)
                $('#longitude').val(lng)

                google.maps.event.addListener(marker, 'dragend', function (event) {
                    document.getElementById("latitude").value  = this.getPosition().lat();
                    document.getElementById("longitude").value  = this.getPosition().lng();
                    GetAddress(new google.maps.LatLng( marker.getPosition().lat(), marker.getPosition().lng()))
                });
                
                google.maps.event.addListener(map, 'click', function(event) {
                    $('#latitude').val(event.latLng.lat())
                    $('#longitude').val(event.latLng.lng())
                    marker.setPosition(event.latLng);
                    map.setCenter(event.latLng);
                    map.setZoom(10);
                    GetAddress(new google.maps.LatLng( event.latLng.lat(), event.latLng.lng()))
                });
            });
        }
    }

    function GetAddress(latlng) {
        var geocoder = geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    document.getElementById("address").value  =  results[1].formatted_address;
                    document.getElementById("searchTextField").value  =  results[1].formatted_address;
                }
            }
        });
    }
    function geocodeAddress(geocoder, resultsMap) {
        const address = document.getElementById("searchTextField").value;
        geocoder.geocode({ address: address }, (results, status) => {
            if (status === "OK") {
                $('#latitude').val(results[0].geometry.location.lat())
                $('#longitude').val(results[0].geometry.location.lng())
                resultsMap.setCenter(results[0].geometry.location);
                const myLatlng = {
                    lat: results[0].geometry.location.lat(),
                    lng:results[0].geometry.location.lng()
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 10,
                    center: myLatlng,
                    mapTypeControl: false,
                    streetViewControl: false,
                });
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()),
                    map: map,
                    title: 'Set lat/lon values for this property',
                    draggable: true ,
                    streetViewControl: false,
                });
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    document.getElementById("latitude").value  = this.getPosition().lat();
                    document.getElementById("longitude").value  = this.getPosition().lng();
                    GetAddress(new google.maps.LatLng( marker.getPosition().lat(), marker.getPosition().lng()))
                });
                google.maps.event.addListener(map, 'click', function(event) {
                    $('#latitude').val(event.latLng.lat())
                    $('#longitude').val(event.latLng.lng())
                    marker.setPosition(event.latLng);
                    map.setCenter(event.latLng);
                    map.setZoom(10);
                    GetAddress(new google.maps.LatLng( event.latLng.lat(), event.latLng.lng()))
                });
            } else {
                // alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDqUJp5NG7f4wHZIThgvqYdd7r9Lq5PcU&callback=initMap&libraries=places&language=ar" type="text/javascript"></script>
{{-- #map --}}
{{-- submit form --}}
<script>
    $(document).on('submit','.register-form',function(e){
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
                toastr.success(response.message)
                $(".submit_button").html("{{__('site.register')}}").attr('disables',false)
                setTimeout(function(){
                    window.location.replace(response.url)
                }, 1000);
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