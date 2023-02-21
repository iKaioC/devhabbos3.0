<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <div class="logo me-auto">
      <h1><a href="{{ route('web-index') }}">Dev Habbos</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>

        @php
          $currentUrl = Request::url();
          $isDropdownActive = $currentUrl === route('web-sv') || $currentUrl === route('web-svbrasil');
        @endphp

        <li>
          <a class="nav-link {{ $currentUrl === route('web-index') ? 'active' : '' }}" 
            href="{{ route('web-index') }}">Home
          </a>
        </li>

        <li>
          <a class="nav-link {{ $currentUrl === route('web-habbo') ? 'active' : '' }}" 
            href="{{ route('web-habbo') }}">Habbos
          </a>
        </li>

        <li class="dropdown {{ $currentUrl === route('web-optional') || $currentUrl === route('web-optional-habbo') ? 'active' : '' }}">
          <a href="#" class="nav-link {{ $currentUrl === route('web-optional') || $currentUrl === route('web-optional-habbo') ? 'active' : '' }}">
            Opcionais
            <i class="bi bi-chevron-down"></i>
          </a>

          <ul>
            <li>
              <a class="nav-link {{ $currentUrl === route('web-optional-habbo') ? 'active' : '' }}" 
                href="{{ route('web-optional-habbo') }}">
                Habbo
              </a>
            </li>

            <li>
              <a class="nav-link {{ $currentUrl === route('web-optional') ? 'active' : '' }}" 
                href="{{ route('web-optional') }}">
                Outros
              </a>
            </li>
          </ul>
        </li>

        <li class="dropdown {{ $currentUrl === route('web-sv') || $currentUrl === route('web-svbrasil') ? 'active' : '' }}">
          <a href="#" class="nav-link {{ $currentUrl === route('web-sv') || $currentUrl === route('web-svbrasil') ? 'active' : '' }}">
            VPS
            <i class="bi bi-chevron-down"></i>
          </a>

          <ul>
            <li>
              <a class="nav-link" 
                href="{{ route('web-sv') }}">
                VPS Canadá
              </a>
            </li>

            <li>
              <a class="nav-link" 
                href="{{ route('web-svbrasil') }}">
                VPS Brasil
              </a>
            </li>
          </ul>
        </li>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </ul>
    </nav>

    @auth
      <div class="header-social-links d-flex align-items-center">
        <a class="btn btn-warning text-black" href="{{ route('client-dashboard') }}"><i class="bi bi-star me-1"></i> Dashboard</a>
      </div>
    @else
      <div class="header-social-links d-flex align-items-center">
        <a class="btn btn-primary text-white" href="{{ url('/login') }}"><i class="bi bi-star me-1"></i> Login</a>
      </div>
    @endauth


  </div>
</header>