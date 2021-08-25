@extends('admin.layout.master')
@section('content')
    <section class="content">
        <div class="row">
            @foreach(statistics() as $menu)
                <div  class="col-xl-2 col-lg-6 col-12" >
                    <div class="card homeCard" >
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        {!! $menu['icon'] !!}
                                    </div>
                                    <div class="media-body text-right  float-left">
                                        <h3>{{$menu['count']}}</h3>
                                        <span>{{$menu['name']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="configuration">
        <div class="row">
            <div class="col-6">
                <div class="card mainCard">
                    <div class="card-header">
                        <h4 class="card-title">{{awtTrans('المستخدمين')}}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                {{-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> --}}
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <canvas id="myChart"></canvas>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

<x-admin.scripts >
    <x-slot name='moreScript'>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const labels = [
                '{{awtTrans('يناير')}}',
                '{{awtTrans('فبراير')}}',
                '{{awtTrans('مارس')}}',
                '{{awtTrans('ابريل')}}',
                '{{awtTrans('مايو')}}',
                '{{awtTrans('يونيو')}}',
                '{{awtTrans('يوليو')}}',
                '{{awtTrans('اغسطس')}}',
                '{{awtTrans('سبتمبر')}}',
                '{{awtTrans('اكتوبر')}}',
                '{{awtTrans('نوفمبر')}}',
                '{{awtTrans('ديسمبر')}}',
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: "{{awtTrans('المستخدمين  خلال السنة')}}",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: @json($users),
                },{
                    label: "{{awtTrans('المشرفين خلال السنة')}}",
                    backgroundColor: 'rgb(75, 192, 192)',
                    borderColor: 'rgb(75, 192, 192)',
                    data: @json($admins),
                }]
            };
            const config = {
                type: 'line',
                data,
                options: {}
            };

            // === include 'setup' then 'config' above ===

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
        <script>

        </script>
    </x-slot >
</x-admin.scripts >