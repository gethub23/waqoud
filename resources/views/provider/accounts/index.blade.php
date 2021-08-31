@extends('provider.layouts.master')
@section('title')
    {{__('site.bank_accounts')}}
@endsection
@section('content')
    @include('provider.layouts.nav')

    <div class="page-contant mt-4 overflow-hidden">
        <div class="container-fluid fadedown">
            <h5 class="titlePages">{{__('site.bank_accounts')}}</h5>
            <a class="btn addBtn mb-2" href="{{url('provider/add-account')}}">{{__('site.add_new_account')}}<i class="fas fa-plus mr-2 ml-2 "></i></a>
            <table id="example" class="datatb table table-striped dt-responsive nowrap" style="width:100%">
                <thead style="background-color:#d0a048; color:#fff;">
                    <tr style="background-color: #42484c;">
                        <th>#</th>
                        <th>{{__('site.account_name')}}</th>
                        <th>{{__('site.account_number')}}</th>
                        <th>{{__('site.iban')}}</th>
                        <th>{{__('site.bank_name')}}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{$account->account_name}}</td>
                            <td>{{$account->account_number}}</td>
                            <td>{{$account->iban}}</td>
                            <td>{{$account->bank->name}}</td>
                            <td><a style="color: #f1790a" href="{{url('provider/edit-account/'.$account->id)}}">{{__('site.edit')}}</a></td>
                            <td><a class="delete-worker" style="color: #f1790a" href="{{url('provider/delete-account/'.$account->id)}}">{{__('site.delete')}}</a></td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).on('click','.delete-worker' , function (e) { 
        e.preventDefault();
       $.ajax({
           type: "get",
           url: $(this).attr('href'),
           data: {},
           dataType: "json",
           success:  (response) =>  {
                toastr.error(response.message)
                $(this).parent().parent().remove()
           }
       }); 
    });
</script>
@endsection