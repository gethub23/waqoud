@extends('admin.layout.master')
<x-admin.breadcrumb singleName='عميل' addbutton='false' deletebutton="false" >
    <x-slot name="moreButtons">
        {{-- <button class="btn btn-purple  btn-sm mr-1 box-shadow-2"><i class="ft-bell white"></i>  ارسال اشعار</button> --}}
     </x-slot> 
 </x-admin.breadcrumb >
@section('content')


    <section class="content settings">
        <div class="card page-body">
            <div class="card card-primary card-tabs m-2">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs text-md" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#main-tab" role="tab" aria-controls="to-main" aria-selected="true">{{awtTrans('إعدادات التطبيق')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  data-toggle="pill" href="#terms-tab" role="tab" aria-controls="to-terms" aria-selected="false">{{awtTrans('الشروط والاحكام')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  data-toggle="pill" href="#about-tab" role="tab" aria-controls="to-about" aria-selected="false">{{awtTrans('من نحن')}}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  data-toggle="pill" href="#privacy-tab" role="tab" aria-controls="to-privacy" aria-selected="false">{{awtTrans('الخصوصية')}}</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-two-tabContent">

                    <!---------------- Main ------------------>
                    <div class="tab-pane fade show active" id="main-tab" role="tabpanel" aria-labelledby="to-main" >

                      <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                          @method('put')
                          @csrf

                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم التطبيق بالعربي')}}</label>
                                  <input type="text" name="name_ar" class="form-control" value="{{$data['name_ar']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('اسم التطبيق بالانجليزية')}}</label>
                                      <input type="text" name="name_en" class="form-control" value="{{$data['name_en']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('البريد الالكتروني')}}</label>
                                  <input type="email" name="email" class="form-control" value="{{$data['email']}}"  required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('رقم الهاتف')}}</label>
                                      <input type="text" name="phone" class="form-control" value="{{$data['phone']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('رقم الواتس')}}</label>
                                      <input type="text" name="whatsapp" class="form-control" value="{{$data['whatsapp']}}" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>{{awtTrans('سعر الباقة السنويه')}}</label>
                                      <input type="text" name="subscribe_price" class="form-control" value="{{$data['subscribe_price']}}" required>
                                  </div>
                              </div>
                              
                              <div class="col-sm-3">
                                <div class="">
                                      <label>{{awtTrans('صوره اللوجو')}}</label>
                                      <div class="dropBox">
                                          <div class="textCenter">
                                              <div class="imagesUploadBlock">
                                                  <label class="uploadImg">
                                                      <span><i class="la la-image"></i></span>
                                                      <input type="file" accept="image/*" name="logo" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/settings/logo.png')}}">
                                                    <button class="close">
                                                      <i class="la la-times"></i>
                                                    </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="">
                                      <label>{{awtTrans('صوره المستخدم الافتراضيه')}}</label>
                                      <div class="dropBox">
                                          <div class="textCenter">
                                              <div class="imagesUploadBlock">
                                                  <label class="uploadImg">
                                                      <span><i class="la la-image"></i></span>
                                                      <input type="file" accept="image/*" name="default_user" class="imageUploader">
                                                  </label>
                                                  <div class="uploadedBlock">
                                                    <img src="{{asset('/storage/images/users/default.png')}}">
                                                    <button class="close">
                                                      <i class="la la-times"></i>
                                                    </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="position-relative col-sm-12">
                                <div id="map" style="width: 100% ; height: 350px; margin: 20px"></div>
                                <input type="text" name="searchTextField" id="searchTextField" class="position-absolute form-control" style="top: 10% ; left: 2%; width: 20%">
                                <input type="hidden" name="address"  id="address" >
                                <input type="hidden" name="latitude" id="latitude" value="{{$data['latitude']}}">
                                <input type="hidden" name="longitude" id="longitude" value="{{$data['longitude']}}">
                            </div>

                              <div class="col-sm-12 mt-2 text-center">
                                <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                              </div>
                    
                          </div>
                      </form>
                    </div>

                    <!---------------- Terms ------------------>
                    <div class="tab-pane fade" id="terms-tab" role="tabpanel" aria-labelledby="to-terms">

                      <form accept="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>{{awtTrans('الشروط والاحكام بالعربية')}}</label>
                                <textarea name="terms_ar" class="form-control" rows="10">{{$data['terms_ar']}}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('الشروط والاحكام بالانجليزية')}}</label>
                                  <textarea name="terms_en" class="form-control" rows="10">{{$data['terms_en']}}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2 text-center">
                              <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                            </div>
                        </div>

                      </form>
                    </div>

                    <!---------------- About ------------------>
                    <div class="tab-pane fade" id="about-tab" role="tabpanel" aria-labelledby="to-about">
                      <form accept="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>{{awtTrans('من نحن بالعربية')}}</label>
                                <textarea name="about_ar" class="form-control" rows="10">{{$data['about_ar']}}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('من نحن بالانجليزية')}}</label>
                                  <textarea name="about_en" class="form-control" rows="10">{{$data['about_en']}}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2 text-center">
                              <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                            </div>
                        </div>
                      </form>
                    </div>

                    <!---------------- privacy ------------------>
                    <div class="tab-pane fade" id="privacy-tab" role="tabpanel" aria-labelledby="to-privacy">
                      <form accept="{{route('admin.settings.update')}}" method="post">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>{{awtTrans('الخصوصية بالعربية')}}</label>
                                <textarea name="privacy_ar" class="form-control" rows="10">{{$data['privacy_ar']}}</textarea>
                              </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                  <label>{{awtTrans('الخصوصية بالانجليزية')}}</label>
                                  <textarea name="privacy_ar" class="form-control" rows="10">{{$data['privacy_ar']}}</textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2 text-center">
                              <div class="form-group"><button type="submit" class="btn btn-primary saveFormBtn">{{awtTrans('حفظ')}}</button></div>
                            </div>
                        </div>
                      </form>
                    </div>


                  </div>
                </div>
              </div>
        </div>
    </section>
@endsection


<x-admin.scripts >
    <x-slot name='moreScript'>
        {{-- Maps --}}
        <script>
          $(document).keypress(
              function(event){
                  if (event.which == '13') {
                      event.preventDefault();
                  }
              });
          function initMap() {
            var lat =  Number("{{$data['latitude']}}")
            var lng =  Number("{{$data['longitude']}}")
              const myLatlng = {
                  lat: Number("{{$data['latitude']}}"),
                  lng: Number("{{$data['longitude']}}"),
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
    </x-slot >
</x-admin.scripts >
