<aside class="main-sidebar elevation-4 sidebar-light-maroon">
    <a href="#" class="brand-link">
        {{-- <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"> --}}
        {{-- <span class="brand-text font-weight-light">{{ config('app.name') }}</span> --}}
    </a>
    

    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="https://i.pinimg.com/736x/5f/40/6a/5f406ab25e8942cbe0da6485afd26b71.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b>{{Auth::user()->name}}</b></a>
                @if (Auth::user()->userType == 0)
                <p>Administrator</p>
                @elseif (Auth::user()->userType == 1)
                <p>Client</p>
                @else
                <p>Taylor</p>
                @endif
                </div>
          </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
