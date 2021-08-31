@extends('provider.layouts.master')
@section('title')
    {{__('site.edit_account')}}
@endsection
@section('content')
    @include('provider.layouts.nav')
    <div class="page-contant mt-4">
        <div class="container-fluid overflow-hidden">
            <h5 class="titlePages"> {{__('site.edit_account')}}</h5>
            <div class="add-form fadedown2">
                <form class="row flex-column align-items-center add-account-form" method="POST" enctype="multipart/form-data" action="{{url('provider/edit-account/'.$account->id)}}">
                    @csrf
                    <div class="form_label col-md-9 col-12">
                        <input type="text" value="{{$account->account_name}}" class="input_focus addofferinput" name="account_name" required/>
                        <label class="float_label">{{__('site.account_name')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input type="text" value="{{$account->account_number}}" class="input_focus addofferinput" name="account_number" required/>
                        <label class="float_label">{{__('site.account_number')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <input type="text" value="{{$account->iban}}" class="input_focus addofferinput" name="iban" required/>
                        <label class="float_label">{{__('site.iban')}}</label>
                    </div>
                    <div class="form_label col-md-9 col-12">
                        <select style="height: 75px !important ;" class="input_focus addofferinput" name="bank_id">
                            <option value=>{{__('site.choose_bank')}}</option>
                            @foreach ($banks as $bank)
                                <option {{$account->bank_id == $bank->id ? 'selected' : ''}} value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
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
            $(document).on('submit','.add-account-form',function(e){
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
                        $(".submit_button").html('<i class="la la-spinner icn-spinner"></i>').attr('disables',true);
                    },
                    success: function(response){
                        toastr.success(response.message)
                        setTimeout(function(){
                            window.location.replace(response.url)
                        }, 1000);
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