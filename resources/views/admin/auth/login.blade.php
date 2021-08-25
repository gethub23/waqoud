@include('admin.layout.partial.header')
<div class="login_lang">
    @if (lang() == 'ar')
        <a class="" href="{{url('admin/lang/en')}}"> <i class="la la-globe"></i> English</a>
    @else
        <a class="" href="{{url('admin/lang/ar')}}"> <i class="la la-globe"></i> Arabic</a>
    @endif
</div>


<section class="authSection d-flex flex-column align-items-center justify-content-center h-100">
    <div class="card authCard">
        <div class="card-header border-0">
            <div class="card-title text-center">
                <div class="p-1">
                    <img class="logoImg" src="{{asset('storage/images/settings/logo.png')}}" alt="branding logo">
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal form-simple" action="{{route('admin.login')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <h5 class="label">{{awtTrans('البريد الالكتروني')}}
                            <span class="required">*</span>
                        </h5>
                        <div class="controls">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-email-message="{{awtTrans('صيغة الايميل غير صحيحة')}}">
                            @if($errors->has('email'))
                                <ul role="alert"><li>{{ $errors->first('email') }}</li></ul>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="label">{{awtTrans('كلمه السر')}}
                            <span class="required">*</span>
                        </h5>
                        <div class="controls">
                            <input name="password" type="password" class="form-control form-control-lg input-lg" id="user-password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-lg btn-block submit_button"><i class="ft-unlock"></i> {{awtTrans('تسجيل دخول')}}</button>
                </form>
            </div>
        </div>
    </div>
</section>

@include('admin.layout.partial.footer')
<script>
    $(document).ready(function(){
        $(document).on('submit','.form-horizontal',function(e){
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
                    if (response.status == 'login'){
                        toastr.success(response.message)
                        setTimeout(function(){
                            window.location.replace(response.url)
                        }, 1000);
                    }else{
                        $(".submit_button").html(`<i class="ft-unlock"></i> {{awtTrans('تسجيل دخول')}}`).attr('disables',false)
                        toastr.error(response.message)
                    }
                },
                error: function (xhr) {
                    $(".submit_button").html("{{awtTrans('تسجيل دخول')}}").attr('disables',false)
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.form-horizontal input[name='+key+'] , #add_form_submit select[name='+key+'] ,.form-horizontal textarea[name='+key+']').parent().parent().removeClass('validate').addClass('issue')
                        $('.form-horizontal input[name='+key+'] , #add_form_submit select[name='+key+'] ,.form-horizontal textarea[name='+key+']').nextAll('.help-block:first').html(`<ul role="alert"><li>${value}</li></ul>`);
                    });
                },
            });

        });
    });
</script>
