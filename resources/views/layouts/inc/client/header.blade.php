<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('client-dashboard') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('client/img/logo.png') }}" alt="">
      <span class="d-none d-lg-block">DevHabbos</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if (Auth::user()->image == '')
            <img src="{{ asset('profile-images/default.png') }}" alt="Profile" class="rounded-circle">
          @else
            <img src="{{ asset('profile-images/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
          @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->name }}</h6>
            <span>{{ Auth::user()->email }}</span><br><br>
            <span class="badge bg-danger"><i class="bi bi-1-circle"></i> {{ Auth::user()->rank }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('user-edit') }}">
              <i class="bi bi-person"></i>
              <span>Meu Perfil</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i> {{ __('Sair') }}
            </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>

        </ul>
      </li>

    </ul>
  </nav>

</header>