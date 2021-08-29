@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("مستحقات")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>{{awtTrans('اسم البنزينة')}}</th>
                    <th>{{awtTrans('المبلغ المستحق')}}</th>
                    <th>{{awtTrans('عرض تفاصيل الطلبات')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td>{{$row->station->name}}</td>
                            <td>{{$row->credit}}</td>
                            <td><a href="{{url('admin/stationdues/'.$row->id)}}">{{awtTrans('عرض')}}</a></td>
                            <td>
                                <div class="badge border-primary primary badge-border edit" data-toggle   ="modal" data-target   ="#editModel"
                                    data-id       = '{{$row->id}}'
                                    data-route    = '{{route('admin.stationwallets.update' , [$row->id])}}'
                                    data-credit   = '{{$row->credit}}' 
                                    data-ids      = '{{$row->dues()->pluck('id')}}' 
                                 ><i class="la la-edit"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- edit model -->
    <div class="modal fade" id="editModel">
        <div class="modal-dialog modal-lg">
           <div class="modal-content position-relative">
                <div class="edit-loader loader loadPage d-none">
                    <div class="loader-wrapper">
                        <div class="loader-container">
                            <div class="folding-cube loader-blue-grey">
                                <div class="cube1 cube"></div>
                                <div class="cube2 cube"></div>
                                <div class="cube4 cube"></div>
                                <div class="cube3 cube"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-header"><h4 class="modal-title">{{awtTrans('تسوية المبلغ')}} </h4></div>
                <form action=""  novalidate  id="editForm" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" name="id" id="id"  hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <h5>{{awtTrans('المبلغ المستحق')}}</h5>
                                    <div class="controls">
                                        <input type="text" name="credit" class="form-control" disabled>
                                        <input type="hidden" name="ids" id="ids">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">{{awtTrans('تسوية')}}</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{awtTrans('اغلاق')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- add model -->
 
@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <script>
            // $(document).on('submit','#editForm2',function(e){
            //     e.preventDefault();
            //     var url = $(this).attr('action')
            //     alert($('#ids').val())
            //     $.ajax({
            //         url: url,
            //         method: 'post',
            //         data: new FormData($(this)[0]),
            //         dataType:'json',
            //         processData: false,
            //         contentType: false,
            //         beforeSend: function(){
            //             $(".edit-loader").removeClass('d-none');
            //         },
            //         success: (response)=>{
            //             toastr.success("{{awtTrans('تم التعديل بنجاح')}}")
            //             setTimeout(function(){
            //                $(".edit-loader").addClass('d-none');
            //             }, 1000);
            //             location.reload();
            //         },
            //     });

            // });
        </script>
    </x-slot >
</x-admin.scripts >