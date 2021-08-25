@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("بنزينة")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
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
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('اسم البنزينة')}}</th>
                    <th>{{awtTrans('اسم المدير')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>{{awtTrans('المدينة')}}</th>
                    <th>{{awtTrans('*')}}</th>
                    <th>{{awtTrans('*')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td><img src="{{$row->avatar}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->boss_name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->city->name}}</td>
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
                                @if($row->block)
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('محظور')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @else
                                     <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('نشط')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id             = '{{$row->id}}'
                                            data-route          = '{{route('admin.stations.update' , [$row->id])}}'
                                            data-avatar         = '{{$row->avatar}}'
                                            data-name           = '{{$row->name}}'
                                            data-phone          = '{{$row->phone}}'
                                            data-email          = '{{$row->email}}'
                                            data-city_id        = '{{$row->city_id}}'
                                            data-boss_name      = '{{$row->boss_name}}'
                                            data-boss_avatar    = '{{$row->boss_avatar}}'
                                            data-boss_phone     = '{{$row->boss_phone}}'
                                            data-boss_identity  = '{{$row->boss_identity}}'
                                            data-active         = '{{$row->active}}'
                                            data-block          = '{{$row->block}}'
                                            data-latitude       = '{{$row->latitude}}'
                                            data-longitude      = '{{$row->longitude}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-avatar         = '{{$row->avatar}}'
                                            data-name           = '{{$row->name}}'
                                            data-phone          = '{{$row->phone}}'
                                            data-email          = '{{$row->email}}'
                                            data-city_id        = '{{$row->city_id}}'
                                            data-boss_name      = '{{$row->boss_name}}'
                                            data-boss_avatar    = '{{$row->boss_avatar}}'
                                            data-boss_phone     = '{{$row->boss_phone}}'
                                            data-boss_identity  = '{{$row->boss_identity}}'
                                            data-active         = '{{$row->active}}'
                                            data-block          = '{{$row->block}}'
                                            data-latitude       = '{{$row->latitude}}'
                                            data-longitude      = '{{$row->longitude}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.stations.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.stations.store")}}' singleName='{{awtTrans("بنزينة")}}' >
        <x-slot name="inputs">
           <div class="col-6">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                                <span>{{awtTrans('صوره البنزينة')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-6">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="boss_avatar" class="imageUploader">
                                </label>
                                <span>{{awtTrans('صوره المدير')}}</span>
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
                    <h5>{{awtTrans('المدن')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  name="city_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر المدينة')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحالة')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  name="active" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="0">{{awtTrans('غير مفعل')}}</option>
                            <option value="1">{{awtTrans('مفعل')}}</option>
                        </select>
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
            <hr>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="boss_name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="boss_phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم هوية المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="boss_identity" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            
            <div class="col-sm-12">
                <label>{{awtTrans('الموقع علي الخريطة')}}</label>
                <div id="map" class="map mt-3 mb-3" style="height: 400px;"></div>
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
            </div>
            

        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("بنزينة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-6">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                </label>
                                <span>{{awtTrans('صوره البنزينة')}}</span>
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
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="boss_avatar" class="imageUploader">
                                </label>
                                <span>{{awtTrans('صوره مدير البنزينة')}}</span>
                                <div class="uploadedBlock">
                                    <img src=""  id="boss_avatar">
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
                    <h5>{{awtTrans('المدن')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select" id="city_id"  name="city_id" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option selected hidden disabled value=>{{awtTrans('اختر المدينة')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الحالة')}}  
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                         <select class=" form-control custom-select"  id="active" name="active" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                            <option value="0">{{awtTrans('غير مفعل')}}</option>
                            <option value="1">{{awtTrans('مفعل')}}</option>
                        </select>
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
            <hr>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="boss_name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="boss_phone" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم هوية المدير')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="boss_identity" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            
            <div class="col-sm-12">
                <label>{{awtTrans('الموقع علي الخريطة')}}</label>
                <div id="edit_map" class="map mt-3 mb-3" style="height: 400px;"></div>
                <input type="hidden" id="latitude_edit" name="latitude" value="">
                <input type="hidden" id="longitude_edit"  name="longitude" value="">
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("بنزينة")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="avatar">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.stations.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
          {{-- Maps --}}
            <script>
                getLocation() ;
                function initMap(lat,lng){
                    var latlng = new google.maps.LatLng( lat, lng);
                    var map    = new google.maps.Map(document.getElementById('map'), {
                        center: latlng,
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng( lat, lng),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });
                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        $('#latitude').val(this.getPosition().lat())
                        $('#longitude').val(this.getPosition().lng())
                        GetAddress(new google.maps.LatLng( marker.getPosition().lat(), marker.getPosition().lng()))

                    });
                }
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "Geolocation is not supported by this browser.";
                    }
                }

                function showPosition(position) {
                    initMap(position.coords.latitude,position.coords.longitude)
                    $('#latitude').val( position.coords.latitude)
                    $('#longitude').val( position.coords.longitude)
                }

                //  function GetAddress(latlng) {
                //     var geocoder = geocoder = new google.maps.Geocoder();
                //     geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                //         if (status == google.maps.GeocoderStatus.OK) {
                //             if (results[1]) {
                //                 document.getElementById("address").value  =  results[1].formatted_address;
                //             }
                //         }
                //     });
                // }

            </script>

            <script>
                $(document).on('click','.edit',function(e){
                    e.preventDefault();
                    var lat  = $(this).data('latitude');
                    var lng  = $(this).data('longitude');

                    document.getElementById("latitude_edit").value   = lat;
                    document.getElementById("longitude_edit").value  = lng;

                    var latlng = new google.maps.LatLng(parseFloat(lat) , parseFloat(lng));
                    var map = new google.maps.Map(document.getElementById('edit_map'), {
                        center: latlng,
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng( lat, lng),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        document.getElementById("latitude_edit").value  = this.getPosition().lat();
                        document.getElementById("longitude_edit").value  = this.getPosition().lng();
                    });
                });
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCtrxqozj9xLkL58Frh0Gl4fiQZ_oATZI&callback=initMap">
            </script>
        {{-- #Maps --}}
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >