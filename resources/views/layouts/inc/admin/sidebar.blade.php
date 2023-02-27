  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @php
          $currentUrl = Request::url();
        @endphp

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-dashboard') ? '' : 'collapsed' }}" 
        href="{{ route('admin-dashboard') }}" href="{{ route('admin-dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-heading">Habbo</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-habbos') ? '' : 'collapsed' }}" 
        href="{{ route('admin-habbos') }}" href="{{ route('admin-habbos') }}">
        <i class="bi bi-controller"></i>
          <span>Servidores</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-optionals') ? '' : 'collapsed' }}" href="{{ route('admin-optionals') }}">
          <i class="bi bi-balloon"></i>
          <span>Opcionais</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-archives') ? '' : 'collapsed' }}" href="{{ route('admin-archives') }}" href="{{ route('admin-archives') }}">
          <i class="bi bi-archive"></i>
          <span>Arquivos</span>
        </a>
      </li>

      <li class="nav-heading">Virtual Private Server</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-servers') ? '' : 'collapsed' }}" href="{{ route('admin-servers') }}">
          <i class="bi bi-device-hdd"></i>
          <span>VPS Canadá</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-servers-brasil') ? '' : 'collapsed' }}" href="{{ route('admin-servers-brasil') }}">
          <i class="bi bi-hdd"></i>
          <span>VPS Brasil</span>
        </a>
      </li>

      <li class="nav-heading">Clientes</li>

      <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-clients') ? '' : 'collapsed' }}" href="{{ route('admin-clients') }}" href="{{ route('admin-clients') }}">
          <i class="bi bi-person"></i>
          <span>Lista de Clientes</span>
        </a>
        </li>
      </li>

      <li class="nav-item">
        <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-tickets-admin') ? '' : 'collapsed' }}" href="{{ route('client-tickets-admin') }}" href="{{ route('client-tickets-admin') }}">
          <i class="bi bi-ticket-detailed"></i>
          <span>Lista de Tickets</span>
        </a>
        </li>

      <li class="nav-heading">Website</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('client-testimonials-admin') ? '' : 'collapsed' }}" href="{{ route('client-testimonials-admin') }}" href="{{ route('client-testimonials-admin') }}">
          <i class="bi bi-chat-left-dots"></i>
          <span>Depoimentos</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-faqs') ? '' : 'collapsed' }}" href="{{ route('admin-faqs') }}" href="{{ route('admin-faqs') }}">
          <i class="bi bi-question-square"></i>
          <span>FAQs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-terms') ? '' : 'collapsed' }}" href="{{ route('admin-terms') }}" href="{{ route('admin-terms') }}">
          <i class="bi bi-book"></i>
          <span>Termos</span>
        </a>
      </li>

    </ul>

  </aside>