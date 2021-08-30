@extends('provider.layouts.master')
@section('content')
    @include('provider.layouts.nav')
    <div class="page-contant mt-4 overflow-hidden">
        <div class="container-fluid fadedown">
            <h5 class="titlePages">{{__('site.orders')}}</h5>
            <table id="example" class="datatb table table-striped dt-responsive nowrap" style="width:100%">
                <thead style="background-color:#d0a048; color:#fff;">
                    <tr style="background-color: #42484c;">
                        <th>{{__('site.order_number')}}</th>
                        <th>{{__('site.user_name')}}</th>
                        <th>{{__('site.worker_name')}}</th>
                        <th>{{__('site.order_price')}}</th>
                        <th>{{__('site.order_date')}}</th>
                        <th>{{__('site.fuel_type')}}</th>
                        <th>{{__('site.litres_count')}}</th>
                        <th>{{__('site.order_status')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->worker->name}}</td>
                            <td style="color: #f1790a">{{$order->total_price}} {{__('site.currency')}}</td>
                            <td class="d-flex align-items-center flex-column"><span>{{date(' d/m/y' , strtotime($order->created_at))}}</span><spam>{{date('h.i A' , strtotime($order->created_at))}}</spam></td>
                            <td>{{$order->fuel->name}}</td>
                            <td>{{$order->liters}}</td>
                            <td>
                                @if ($order->status == 'new')
                                    {{__('site.new_order')}}
                                @elseif ($order->status == 'accepted')
                                    {{__('site.order_accepted')}}
                                @elseif ($order->status == 'finished')
                                    {{__('site.order_finished')}}
                                @else
                                    {{__('site.order_canceled')}}
                                @endif
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection