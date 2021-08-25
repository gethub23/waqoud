@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("رساله")}}' deletebutton="true" addbutton="false" >
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
                    <th>{{awtTrans('اسم صاحب الرسالة ')}}</th>
                    <th>{{awtTrans('رقم هاتف صاحب الرسالة ')}}</th>
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
                            <td>{{$row->user_name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-user_name   = '{{$row->user_name}}'
                                            data-message     = '{{$row->message}}'
                                            data-phone       = '{{$row->phone}}'
                                            data-user        = '{{$row->user_id != null ?  $row->user->name : 'غير محدد'}}'
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.messages.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("رسالة")}}' >
        <x-slot name="inputs">

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم صاحب الرسالة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="user_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم المستخدم لدي التطبيق ')}} 
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
            <div class="col-sm-12"> 
                <div class="form-group">
                    <h5>{{awtTrans('نص الرسالة')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <textarea cols="30" rows="10" name="message" class="form-control message"></textarea>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.messages.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >