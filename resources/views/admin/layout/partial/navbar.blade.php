 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-hide-on-scroll navbar-shadow navbar-brand-center headroom headroom--top headroom--not-bottom">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="nav-item">
                @if (lang() == 'ar')
                  <a class="nav-link" href="{{url('admin/lang/en')}}">English</a>                    
                @else
                  <a class="nav-link" href="{{url('admin/lang/ar')}}">Arabic</a>                    
                @endif
            </li>
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">{{awtTrans('مرحبا')}} ,
                  <span class="user-name text-bold-700">{{auth()->user()->name}}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="{{asset(auth()->user()->avatar)}}" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('admin.admins.edit',auth()->id())}}"><i class="ft-user"></i> {{awtTrans('تعديل البروفايل')}}</a>
                <div  class="dropdown-divider"></div><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" href="#"><i class="ft-power"></i>{{ awtTrans('تسجيل الخروج<')}}</a>
                 <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>