<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/')}}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <!-- Messages Dropdown Menu -->
    @auth   
    <li class="nav-item">
      <a href="{{url('user/'.auth()->user()->id.'/edit')}}" class="nav-link">
        <p>
          Ubah Data
        </p>
      </a>
    </li>
    @else
    <li class="nav-item">
      <a href="{{url('login')}}" class="nav-link">
        <p>
          Login
        </p>
      </a>
    </li>
    @endauth

    @auth
    <li class="nav-item">
      <a href="{{url('logout')}}" class="nav-link">
        <p>
          Logout
        </p>
      </a>
    </li>
    @endauth
  </ul>
</nav>
