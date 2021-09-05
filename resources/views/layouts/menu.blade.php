@if (Auth::user()->userType == 0)
<li class="nav-item">
    <a href="{{route('users.index')}}" class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-users"></i>
      <p>
        User Management
      </p>
    </a>
  </li>
@endif

{{-- Client --}}
@if (Auth::user()->userType == 1)

<li class="nav-item">
    <a href="{{route('client.taylors.index')}}" class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Find Taylors
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{route('client.orders.index')}}"class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Request order
      </p>
    </a>
  </li>
@endif

{{-- Taylor --}}
@if (Auth::user()->userType == 2)
<li class="nav-item">
    <a href="{{route('taylor.products.index')}}" class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Products
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{route('taylor.clients.index')}}" class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Clients
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{route('taylor.orders.index')}}" class="nav-link" id="navi_link">
      <i class="nav-icon fas fa-box"></i>
      <p>
        Order List
      </p>
    </a>
  </li>
@endif