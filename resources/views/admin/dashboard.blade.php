@extends('layouts.admin')

@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Column -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Habbos Card -->
          <div class="col-xxl-4 col-md-4">

            <div class="card info-card customers-card">

              <a href="{{ route('admin-habbos') }}">
                <div class="card-body">
                  <h5 class="card-title">Habbos <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>R$ {{ number_format($totalHabbo, 2, ',', '.') }}</h6>
                      <span class="text-warning small pt-1 fw-bold">{{ $userHabbos->count() }}</span> <span class="text-muted small pt-2 ps-1">Habbos no total</span>

                    </div>
                  </div>

                </div>
              </a>
            </div>

          </div><!-- End Habbos Card -->

          <!-- VPS Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">
              <a href="{{ route('admin-servers') }}">
                <div class="card-body">
                  <h5 class="card-title">VPS's <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-server"></i>
                    </div>
                    <div class="ps-3">
                      <h6>R$ {{ number_format($totalRevenue, 2, ',', '.') }}</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $vpsServers->count() }}</span> <span class="text-muted small pt-2 ps-1">VPS's no total</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End VPS Card -->

          <!-- Optionals Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card optionals-card">
              <a href="{{ route('admin-optionals') }}">
                <div class="card-body">
                  <h5 class="card-title">Opcionais <span>| Total</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-patch-plus-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>R$ {{ number_format($totalOptional, 2, ',', '.') }}</h6>
                      <span class="text-danger small pt-1 fw-bold">{{ $userOptionals->count() }}</span> <span class="text-muted small pt-2 ps-1">Opcionais no total</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div><!-- End Optionals Card -->

          <!-- Clients Card -->
          <div class="col-xxl-4 col-md-12">
            <div class="card info-card sales-card">
              
                <div class="card-body align-self-center">
                  <a href="{{ route('admin-habbos') }}">
                    <h5 class="card-title text-center">Clientes <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-up"></i>
                      </div>

                      <div class="ps-3">
                        <h6>{{ $totalUsers }} Clientes</h6>
                        @if ($growthPercentage > 0)
                          <span class="text-success small pt-1 fw-bold">{{ number_format($growthPercentage, 2) }}%</span> 
                          <span class="text-muted small pt-2 ps-1">de aumento</span>
                        @elseif ($growthPercentage < 0)
                          <span class="text-danger small pt-1 fw-bold">{{ number_format($growthPercentage, 2) }}%</span> 
                          <span class="text-muted small pt-2 ps-1">de queda</span>
                        @else
                          <span class="text-secondary small pt-1 fw-bold">{{ number_format($growthPercentage, 2) }}%</span> 
                          <span class="text-muted small pt-2 ps-1">sem mudança</span>
                        @endif
                      </div>
                    </div>
                  </a>
                </div>
              
            </div>
          </div><!-- End Clients Card -->

        </div>
      </div><!-- End Column -->

    </div>
  </section>
  
@endsection