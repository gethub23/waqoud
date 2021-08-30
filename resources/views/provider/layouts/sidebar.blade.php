<section class="sidebar">
    <a class="defult-link" href="index.html">
        <div class="logohead">
            <img src="{{asset('provider/images/logoo.png')}}">
        </div>
    </a>
    <div class="d-flex flex-column align-items-center">
        <img class="gasProfil" src="{{asset('provider/images/logohead.png')}}">
        <h5 class="gasStation-name">{{auth('station')->user()->name }}</h5>
    </div>
    <div class="sidenav mt-4">
        <ul class="p-0">
            <li class="{{isActiveRoute('orders')}}">
                <a class="sidenav-link" href="{{url('provider/dashboard')}}">
                    <div style="width:60%;margin:auto" class="d-flex align-items-center">
                        <i class="fas fa-scroll"></i>
                        <p class="mb-0 mr-3 ml-3">{{__('site.orders')}}</p>
                    </div>
                </a>
            </li>
            <li class="{{isActiveRoute('workers')}}">
                <a class="sidenav-link" href="{{url('provider/workers')}}">
                    <div style="width:60%;margin:auto" class="d-flex align-items-center">
                        <i class="far fa-user"></i>
                        <p class="mb-0 mr-3 ml-3">{{__('site.workers')}}</p>
                    </div>
                </a>
            </li>
            <li class="{{isActiveRoute('settings')}}">
                <a class="sidenav-link" href="{{url('provider/settings')}}">
                    <div style="width:60%;margin:auto" class="d-flex align-items-center">
                        <i class="fas fa-cog"></i>
                        <p class="mb-0 mr-3 ml-3">{{__('site.settings')}}</p>
                    </div>
                </a>
            </li>

            <li class="">
                <a class="sidenav-link" href="{{url('provider/logout')}}">
                    <div style="width:60%;margin:auto" class="d-flex align-items-center">
                        <img src="images/logout.png">
                        <p class="mb-0 mr-3 ml-3">{{__('site.logout')}}</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="pagebody">