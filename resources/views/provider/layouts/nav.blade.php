<div id="fixedHead" class="top-nav">
    <div class="container-fluid overflow-auto">
        <div class="d-flex align-items-center justify-content-between">
            <a class="slidToggle">
                <i class="fas fa-bars"></i>
            </a>
            <div class="mr-4 ml-4 d-flex align-items-center">
                <a class="mr-2 ml-2 position-relative" href="{{url('provider/notifications')}}">
                    <img src="images/bell.png" alt="">
                    <span class="notPach"></span>
                </a>
                <a class="d-flex align-items-center defult-link" href="{{url('provider/settings')}}">
                    <img style="width: 55px;height: 55px;margin: 0 15px; border: 0" class="gasProfil" src="{{auth()->user()->avatar }}" alt="profile">
                    <h5 style="font-size: 15px" class="gasStation-name m-0">{{__('site.welcom')}} <span style="color: #333">{{auth()->user()->name }}</span></h5>
                </a>
            </div>
        </div>
    </div>
</div>