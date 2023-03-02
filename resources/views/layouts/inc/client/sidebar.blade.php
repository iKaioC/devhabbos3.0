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
      </li>

      <li class="nav-heading">Serviços</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-servers') ? '' : 'collapsed' }}" 
        href="{{ route('client-servers') }}" href="{{ route('client-servers') }}">
          <i class="bi bi-server"></i>
          <span>VPS</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-habbos') ? '' : 'collapsed' }}" href="{{ route('client-habbos') }}">
          <i class="bi bi-joystick"></i>
          <span>Habbo</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-optionals') ? '' : 'collapsed' }}" href="{{ route('client-optionals') }}" href="{{ route('client-optionals') }}">
          <i class="bi bi-arrow-down-up"></i>
          <span>Opcionais</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-optionals') ? '' : 'collapsed' }}" href="{{ route('client-other-optionals') }}" href="{{ route('client-optionals') }}">
          <i class="bi bi-piggy-bank"></i>
          <span>Outros</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('testimonial-index') ? '' : 'collapsed' }}" href="{{ route('testimonial-index') }}" href="{{ route('testimonial-index') }}">
          <i class="bi bi-chat"></i>
          <span>Depoimentos</span>
        </a>
      </li>

      <li class="nav-heading">Conta</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('user-edit') ? '' : 'collapsed' }}" href="{{ route('user-edit') }}" href="{{ route('user-edit') }}">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('tickets-index') ? '' : 'collapsed' }}" href="{{ route('tickets-index') }}" href="{{ route('tickets-index') }}">
          <i class="bi bi-ticket-detailed"></i>
          <span>Tickets</span>
        </a>
      </li>

      

    </ul>

  </aside>