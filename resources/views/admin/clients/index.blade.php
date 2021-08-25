@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("عميل")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
         <button class="btn btn-purple  btn-sm mr-1 box-shadow-2 notify" id="all" data-toggle="modal" data-target="#messageAllModel"><i class="ft-bell white"></i>  {{awtTrans('ارسال اشعار')}}</button>
    </x-slot>
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                   </th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('البريد الالكتروني')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>*</th>
                    <th>*</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($clients as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                @if($row->block)
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('محظور')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('غير محظور')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if(!$row->active)
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('غير مفعل')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('مفعل')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id                 = '{{$row->id}}'
                                            data-route              = '{{route('admin.clients.update' , [$row->id])}}'
                                            data-name               = '{{$row->name}}'
                                            data-phone              = '{{$row->phone}}'
                                            data-email              = '{{$row->email}}'
                                            data-avatar             = '{{$row->avatar}}'
                                            data-block              = '{{$row->block}}'
                                            data-active             = '{{$row->active}}'
                                            data-identity           = '{{$row->identity}}'
                                            data-gender             = '{{$row->gender}}'
                                            data-latitude           = '{{$row->latitude}}'
                                            data-longitude          = '{{$row->longitude}}'
                                            data-subscribed         = '{{$row->subscribed}}'
                                            data-subscribe_end      = '{{date('Y-m-d\TH:i', strtotime($row->subscribe_end))}}'
                                            data-birthdate          = '{{date('Y-m-d\TH:i', strtotime($row->birthdate))}}'
                                        </x-slot>
                                    </x-admin.edit-button>
                                <x-admin.delete route="{{route('admin.clients.delete' , [$row->id])}}" />
                                <button class="badge border-info info badge-border notify" id="{{$row->id}}" data-toggle="modal" data-target="#messageAllModel">
                                    <i class="la la-bell"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.clients.store")}}' singleName='{{awtTrans("عميل")}}' >
        <x-slot name="inputs">
           <div class="col-12">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاسم')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهاتف ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهوية ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="identity" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('كلمه السر ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" required  minlength="6" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-minlength-message="{{awtTrans('يجب الا تقل كلمه السر عن 6 حروف او ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('تاريخ الميلاد ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="datetime-local" name="birthdate" class="form-control" required  data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاشتراك')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  name="subscribed" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="1">{{awtTrans('مشترك')}}</option>
                            <option value="0">{{awtTrans('غير مشترك')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('تاريخ انتهاء الاشتراك ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="datetime-local" name="subscribe_end" class="form-control" required  data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحظر')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="1">{{awtTrans('محظور')}}</option>
                            <option value="0">{{awtTrans('غير محظور')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('النوع')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  name="gender" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="male">{{awtTrans('ذكر')}}</option>
                            <option value="female">{{awtTrans('انثي')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="position-relative col-sm-12">
                <div id="map" style="width: 100% ; height: 350px; margin: 20px"></div>
                <input type="text" name="searchTextField" id="searchTextField" class="position-absolute form-control" style="top: 10% ; left: 2%; width: 20%">
                <input type="hidden" name="address"  id="address">
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
            </div>


        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("عميل")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="avatar">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاسم')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهاتف ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهوية ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="identity" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('البريد الالكتروني')}}
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('كلمه السر ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="password" name="password" class="form-control" required  minlength="6" data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-minlength-message="{{awtTrans('يجب الا تقل كلمه السر عن 6 حروف او ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('تاريخ الميلاد ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="datetime-local" name="birthdate" class="form-control" required  data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الاشتراك')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="subscribed"  name="subscribed" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="1">{{awtTrans('مشترك')}}</option>
                            <option value="0">{{awtTrans('غير مشترك')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('تاريخ انتهاء الاشتراك ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="datetime-local" name="subscribe_end" class="form-control" required  data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحظر')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="block"  name="block" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="1">{{awtTrans('محظور')}}</option>
                            <option value="0">{{awtTrans('غير محظور')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('النوع')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="gender"  name="gender" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="male">{{awtTrans('ذكر')}}</option>
                            <option value="female">{{awtTrans('انثي')}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="position-relative col-sm-12">
                <div id="edit_map" style="width: 100% ; height: 350px; margin: 20px"></div>
                <input type="text" name="searchTextField" id="searchTextField2" class="position-absolute form-control" style="top: 10% ; left: 2%; width: 20%">
                <input type="hidden" name="address"  id="address2">
                <input type="hidden" name="latitude" id="latitude2">
                <input type="hidden" name="longitude" id="longitude2">
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->


 <!-- notify model -->
    <x-admin.notify-all route='{{route("admin.clients.notify")}}' singleName='{{awtTrans("عميل")}}'  />
 <!-- end notify model --> --}}
 {{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.clients.deleteAll')}}" />
 {{-- #delete all model  --}}

@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            $(document).on('click' , '.notify' , function (e) {
                $('.typeInput').val(this.id)
            })
        </script>
        {{-- Maps --}}
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
                            const myLatlng = {
                                lat: p.coords.latitude,
                                lng: p.coords.longitude
                            };
                            const map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 18,
                                center: myLatlng,
                                mapTypeControl: false,
                                streetViewControl: false,
                            });
                            $('#latitude').val(p.coords.latitude)
                            $('#longitude').val(p.coords.longitude)
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
                                position: new google.maps.LatLng(p.coords.latitude, p.coords.longitude),
                                map: map,
                                title: 'Set lat/lon values for this property',
                                draggable: true,
                                streetViewControl: false,
                            });

                            GetAddress(new google.maps.LatLng( p.coords.latitude, p.coords.longitude))


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
                                map.setZoom(18);
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
                            // new google.maps.Marker({
                            //     zoom: 4,
                            //     map: resultsMap,
                            //     position: results[0].geometry.location,
                            //     // draggable: true
                            //
                            // });
                            const myLatlng = {
                                lat: results[0].geometry.location.lat(),
                                lng:results[0].geometry.location.lng()
                            };
                            const map = new google.maps.Map(document.getElementById("map"), {
                                zoom: 18,
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
                                map.setZoom(18);
                                GetAddress(new google.maps.LatLng( event.latLng.lat(), event.latLng.lng()))
                            });
                        } else {
                            // alert("Geocode was not successful for the following reason: " + status);
                        }
                    });
                }
            </script>

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDqUJp5NG7f4wHZIThgvqYdd7r9Lq5PcU&callback=initMap&libraries=places&language=ar" type="text/javascript"></script>
        {{-- #Maps --}}

        <script>
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                editMap($(this).data('latitude'),$(this).data('longitude'))
            })
            function editMap(lat , lng){
                document.getElementById("latitude2").value   = lat;
                document.getElementById("longitude2").value  = lng;
                var latlng = new google.maps.LatLng(parseFloat(lat) , parseFloat(lng));
                var map = new google.maps.Map(document.getElementById('edit_map'), {
                    center: latlng,
                    zoom: 18,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var input = document.getElementById('searchTextField2');
                var autocomplete = new google.maps.places.Autocomplete(input);
                const geocoder = new google.maps.Geocoder();
                document.getElementById("searchTextField2").addEventListener("keyup", () => {
                    geocodeAddress2(geocoder, map);
                });
                document.getElementById("searchTextField2").addEventListener("change", () => {
                    geocodeAddress2(geocoder, map);
                });

                GetAddress2(new google.maps.LatLng( lat , lng))


                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng( lat, lng),
                    map: map,
                    title: 'Set lat/lon values for this property',
                    draggable: true
                });
                google.maps.event.addListener(marker, 'dragend', function (event) {
                    document.getElementById("latitude2").value  = this.getPosition().lat();
                    document.getElementById("longitude2").value  = this.getPosition().lng();
                    GetAddress2(new google.maps.LatLng( marker.getPosition().lat(), marker.getPosition().lng()))
                });
                google.maps.event.addListener(map, 'click', function(event) {
                    $('#latitude2').val(event.latLng.lat())
                    $('#longitude2').val(event.latLng.lng())
                    marker.setPosition(event.latLng);
                    map.setCenter(event.latLng);
                    map.setZoom(18);
                    GetAddress2(new google.maps.LatLng( event.latLng.lat(), event.latLng.lng()))
                });
            }
            function GetAddress2(latlng) {
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById("address2").value  =  results[1].formatted_address;
                            document.getElementById("searchTextField2").value  =  results[1].formatted_address;
                        }
                    }
                });
            }
            function geocodeAddress2(geocoder, resultsMap) {
                const address = document.getElementById("searchTextField2").value;
                geocoder.geocode({ address: address }, (results, status) => {
                    if (status === "OK") {
                        $('#latitude2').val(results[0].geometry.location.lat())
                        $('#longitude2').val(results[0].geometry.location.lng())
                        resultsMap.setCenter(results[0].geometry.location);
                        // new google.maps.Marker({
                        //     zoom: 4,
                        //     map: resultsMap,
                        //     position: results[0].geometry.location,
                        //     // draggable: true
                        //
                        // });
                        const myLatlng = {
                            lat: results[0].geometry.location.lat(),
                            lng:results[0].geometry.location.lng()
                        };
                        const map = new google.maps.Map(document.getElementById("edit_map"), {
                            zoom: 18,
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
                            document.getElementById("latitude2").value  = this.getPosition().lat();
                            document.getElementById("longitude2").value  = this.getPosition().lng();
                            GetAddress2(new google.maps.LatLng( marker.getPosition().lat(), marker.getPosition().lng()))

                        });
                        google.maps.event.addListener(map, 'click', function(event) {
                            $('#latitude2').val(event.latLng.lat())
                            $('#longitude2').val(event.latLng.lng())
                            marker.setPosition(event.latLng);
                            map.setCenter(event.latLng);
                            map.setZoom(18);
                            GetAddress2(new google.maps.LatLng( event.latLng.lat(), event.latLng.lng()))
                        });
                    } else {
                    }
                });
            }
        </script>
    </x-slot >
</x-admin.scripts >