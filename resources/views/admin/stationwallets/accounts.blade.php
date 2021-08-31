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
                    <th>{{awtTrans('اسم البنك')}}</th>
                    <th>{{awtTrans('اسم الحساب')}}</th>
                    <th>{{awtTrans('رقم الحساب')}}</th>
                    <th>{{awtTrans('رقم الايبان')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td>{{$row->bank->name}}</td>
                            <td>{{$row->account_name}}</td>
                            <td>{{$row->account_number}}</td>
                            <td>{{$row->iban}}</td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>
@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
       
    </x-slot >
</x-admin.scripts >