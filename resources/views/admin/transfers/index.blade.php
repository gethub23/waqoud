@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("حوالة")}}' deletebutton="true" addbutton="true" >
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
                    <th>{{awtTrans('صوره الحواله')}}</th>
                    <th>{{awtTrans('اسم صاحب الحوالة')}}</th>
                    <th>{{awtTrans('نوع الحوالة')}}</th>
                    <th>{{awtTrans('الملبغ المحول')}}</th>
                    <th>*</th>
                    <th>{{awtTrans(' التحكم')}}</th>
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
                            <td><a target="_blank" href="{{$row->image}}"><img src="{{$row->image}}" alt=""></a></td>
                            <td>{{$row->user_name}}</td>
                            <td>{{$row->type == 'charge' ? awtTrans('حوالة شحن') : awtTrans('باقه سنوية')}}</td>
                            <td>{{$row->amount}}</td>
                            <td class="accept_{{$row->id}}">
                                @if($row->accepted == 'new')
                                    <span class="btn btn-sm round btn-outline-success transfer_accept" data-type="accept" data-id="{{$row->id}}"> 
                                        {{awtTrans('قبول')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                    <span class="btn btn-sm round btn-outline-danger transfer_accept" data-type="refuse" data-id="{{$row->id}}"> 
                                        {{awtTrans('رفض')}}  <i class="la la-close font-medium-2"></i>
                                    </span>
                                @elseif ($row->accepted == 'accepted')
                                    <span class="btn btn-sm round btn-outline-success"> 
                                        {{awtTrans('مقبول')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @else
                                    <span class="btn btn-sm round btn-outline-danger"> 
                                        {{awtTrans('مرفوض')}}  <i class="la la-check font-medium-2"></i>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-bank_from_name   = '{{$row->bank_from_name}}'
                                            data-bank             = '{{$row->bank->name}}'
                                            data-phone            = '{{$row->phone}}'
                                            data-amount           = '{{$row->amount}}'
                                            data-user_name        = '{{$row->user_name}}'
                                            data-user             = '{{$row->user->name}}'
                                            data-package          = '{{$row->package_id ? $row->package->title : 'باقه سنوية'}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.transfers.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("حوالة")}}' >
        <x-slot name="inputs">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك المحول منه')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="bank_from_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك المحول له')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="bank" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم صاحب الحوالة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="user_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم صاحب الحوالة لدي التطبيق')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="user" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الهاتف')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الملبغ المدفوع')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="amount" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('الباقة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="package" class="form-control">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.transfers.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            $(document).on('click','.transfer_accept',function (e) { 
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{url('admin/transfers/accept/')}}" +'/'+ $(this).data('id') + '/' + $(this).data('type'),
                    data: {},
                    dataType: "json",
                    success:  (response) =>  {
                        if (response.status == 'done') {
                            toastr.success(response.message)
                            $('.accept_'+$(this).data('id')).html(`
                                <span class="btn btn-sm round btn-outline-success"> 
                                    {{awtTrans('مقبول')}}  <i class="la la-check font-medium-2"></i>
                                </span>
                            `)
                        }else{
                            toastr.error(response.message)
                            $('.accept_'+$(this).data('id')).html(`
                                <span class="btn btn-sm round btn-outline-danger"> 
                                    {{awtTrans('مرفوض')}}  <i class="la la-check font-medium-2"></i>
                                </span>
                            `)
                        }
                    }
                });
                
            });
        </script>
    </x-slot >
</x-admin.scripts >