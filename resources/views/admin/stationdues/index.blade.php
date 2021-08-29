@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("تفصيل")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('رقم الطلب')}}</th>
                    <th>{{awtTrans('المبلغ المستحق للطلب')}}</th>
                    <th>{{awtTrans('اسم العميل المستفيد')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td>{{$row->order_id}}</td>
                            <td>{{$row->order_price}}</td>
                            <td>{{$row->order->user->name}}</td>
                            <td><span class="do_action" data-id="{{$row->id}}">{{awtTrans('تسوية')}}</span></td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <script>
            $(document).on('click','.do_action',function (e) { 
                e.preventDefault();
                var id = $(this).data('id')
                $.ajax({
                    type: "put",
                    url: "{{url('admin/stationdues/')}}" + '/' + id,
                    data: {},
                    dataType: "json",
                    success:  (response) => {
                        $('.delete_row_'+id).remove() ; 
                        toastr.success('{{awtTrans("تم تسوية الطلب بنجاح")}}')
                    }
                });
            });
        </script>
    </x-slot >
</x-admin.scripts >