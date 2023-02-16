  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @php
          $currentUrl = Request::url();
        @endphp

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-dashboard') ? '' : 'collapsed' }}" 
        href="{{ route('client-dashboard') }}" href="{{ route('client-dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Serviços</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-servers') ? '' : 'collapsed' }}" 
        href="{{ route('client-servers') }}" href="{{ route('client-servers') }}">
          <i class="bi bi-server"></i>
          <span>VPS</span>
        </a>
      </li><!-- End Servers Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-habbos') ? '' : 'collapsed' }}" href="{{ route('client-habbos') }}">
          <i class="bi bi-joystick"></i>
          <span>Habbo</span>
        </a>
      </li><!-- End Optionals Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('client-optionals') }}">
          <i class="bi bi-arrow-down-up"></i>
          <span>Opcionais</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('testimonial-index') }}">
          <i class="bi bi-chat"></i>
          <span>Depoimentos</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-heading">Conta</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user-edit') }}">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('tickets-index') }}">
          <i class="bi bi-ticket-detailed"></i>
          <span>Tickets</span>
        </a>
      </li><!-- End Profile Page Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->