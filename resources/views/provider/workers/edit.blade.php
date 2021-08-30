@extends('provider.layouts.master')
@section('title')
    {{__('site.edit_worker')}}
@endsection
@section('content')
    @include('provider.layouts.nav')
    <div class="page-contant mt-4">
        <div class="container-fluid overflow-hidden">
            <h5 class="titlePages"> {{__('site.edit_worker')}}</h5>
            <div class="add-form fadedown2">
                <form class="row flex-column align-items-center edit-worker-form" method="POST" enctype="multipart/form-data" action="{{url('provider/edit-worker/'.$worker->id)}}">
                    @csrf
                    @method('put')
                    <div class="form_label col-md-9 col-12">
                        <input type="text" class="input_focus addofferinput" name="name" value="{{$worker->name}}" required/>
                        <label class="float_label">{{__('site.worker_name')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12 position-relative">
                        <input id="phone" type="number" class="input_focus addofferinput" value="{{$worker->phone}}" name="phone" required/>
                        <label class="float_label">{{__('site.phone2')}}</label>
                        <select class="code-num" name="key">
                            @foreach ($keys as $key)
                                <option {{$worker->key == $key->key ? 'selected' : ''}} value="{{$key->key}}">{{$key->key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <select style="height: 75px !important ;" class="input_focus addofferinput" name="city_id">
                            <option value=>{{__('site.choose_city')}}</option>
                            @foreach ($cities as $city)
                                <option {{$city->id == $worker->city_id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input type="number" class="input_focus addofferinput" value="{{$worker->identity}}" name="identity" required/>
                        <label class="float_label">{{__('site.identity')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input type="number" class="input_focus addofferinput" value="{{$worker->salary}}" name="salary" required/>
                        <label class="float_label">{{__('site.salary')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input id="inp1" type="password" name="password"  class="input_focus addofferinput"/>
                        <label class="float_label">{{__('site.password')}}</label>
                        <img class="showPass" src="{{asset('provider/images/eyes.png')}}">
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                        <button class="add-btn submit_button">{{__('site.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(document).on('submit','.edit-worker-form',function(e){
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
                        if (response.status == 'success'){
                            toastr.success(response.message)
                            setTimeout(function(){
                                window.location.replace(response.url)
                            }, 1000);
                        }else{
                            $(".submit_button").html(`{{__('site.save')}}`).attr('disables',false)
                            toastr.error(response.message)
                        }
                    },
                    error: function (xhr) {
                        $(".submit_button").html("{{__('site.save')}}").attr('disables',false)
                        $('.error_meassages').remove();
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            toastr.error(value)
                        });
                    },
                });

            });
        });
    </script>
@endsection