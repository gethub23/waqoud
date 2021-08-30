@extends('provider.layouts.master')
@section('title')
    {{__('site.workers')}}
@endsection
@section('content')
    @include('provider.layouts.nav')

    <div class="page-contant mt-4 overflow-hidden">
        <div class="container-fluid fadedown">
            <h5 class="titlePages">{{__('site.workers')}}</h5>
            <a class="btn addBtn mb-2" href="{{url('provider/add-worker')}}">{{__('site.add_new_worker')}}<i class="fas fa-plus mr-2 ml-2 "></i></a>
            <table id="example" class="datatb table table-striped dt-responsive nowrap" style="width:100%">
                <thead style="background-color:#d0a048; color:#fff;">
                    <tr style="background-color: #42484c;">
                        <th>#</th>
                        <th>{{__('site.worker_name')}}</th>
                        <th>{{__('site.city')}}</th>
                        <th>{{__('site.salary')}}</th>
                        <th>{{__('site.identity')}}</th>
                        <th>{{__('site.worker_phone')}}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workers as $worker)
                        <tr>
                            <td>#{{$worker->id}}</td>
                            <td>{{$worker->name}}</td>
                            <td>{{$worker->city->name}}</td>
                            <td style="color: #f1790a">{{$worker->salary}} {{__('site.currency')}}</td>
                            <td>{{$worker->identity}}</td>
                            <td>{{$worker->phone}}</td>
                            <td><a style="color: #f1790a" href="{{url('provider/edit-worker/'.$worker->id)}}">{{__('site.edit')}}</a></td>
                            <td><a class="delete-worker" style="color: #f1790a" href="{{url('provider/delete-worker/'.$worker->id)}}">{{__('site.delete')}}</a></td>
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