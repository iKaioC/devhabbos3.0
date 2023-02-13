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
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Habbo</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-habbos') ? '' : 'collapsed' }}" 
        href="{{ route('admin-habbos') }}" href="{{ route('admin-habbos') }}">
          <i class="bi bi-person"></i>
          <span>Servidores</span>
        </a>
      </li><!-- End Servers Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-optionals') ? '' : 'collapsed' }}" href="{{ route('admin-optionals') }}">
          <i class="bi bi-person"></i>
          <span>Opcionais</span>
        </a>
      </li><!-- End Optionals Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Extras</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Arquivos</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-heading">Virtual Private Server</li>

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-servers') ? '' : 'collapsed' }}" href="{{ route('admin-servers') }}">
          <i class="bi bi-person"></i>
          <span>VPS Canadá</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl === route('admin-servers-brasil') ? '' : 'collapsed' }}" href="{{ route('admin-servers-brasil') }}">
          <i class="bi bi-person"></i>
          <span>VPS Brasil</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Em uso</span>
        </a>
      </li><!-- End Extras Page Nav -->

      <li class="nav-heading">Usuários</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#vps-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Usuários</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="vps-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Clientes</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Servidores</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Opcionais</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Extras</span>
            </a>
          </li>
        </ul>

        <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Em uso</span>
        </a>
        </li><!-- End Extras Page Nav -->
      </li><!-- End Forms Nav -->

      <li class="nav-heading">Website</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>Depoimentos</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->