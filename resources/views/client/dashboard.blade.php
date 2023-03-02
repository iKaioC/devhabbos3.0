@extends('layouts.client')
@section('title', 'Dashboard')
@section('content')

  @if(session('error'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('error') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
      </ol>
    </nav>
  </div>{{-- End Page Title --}}

      {{-- Content --}}
      <div class="col-lg-12">
        <div class="row justify-content-md-center">
          

          <div class="col-lg-8">
            <div class="row justify-content-md-center">
  
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">VPS <span>| Ativos</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <a href="{{ route('client-servers') }}" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Quantidade de VPS's">
                          <i class="bi bi-star me-1"></i> 
                          {{ Auth::user()->servers()->whereNotIn('status', ['Cancelado'])->whereIn('status', ['Ativo', 'Pendente'])->count() }}
                        </a>



                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->
  
              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Habbos <span>| Final</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <a href="{{ route('client-habbos') }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Quantidade de Habbo's">
                          <i class="bi bi-star me-1"></i> 
                          {{ Auth::user()->habbos()->count() }}
                        </a>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Outros <span>| Final</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <a href="{{ route('client-optionals') }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Quantidade de Opcionais">
                          <i class="bi bi-star me-1"></i> 
                          {{ Auth::user()->optionals()->count() }}
                        </a>
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->
              
            </div>

            <div class="card">
              <div class="card-header">Bem-vindo(a)!</div>
              <div class="card-body">
                <h5 class="card-title">Painel do Cliente - Dev Habbos</h5>
                O painel de controle lhe dará maior controle dos seus gastos na Dev Habbos,
                e também uma melhor visão do que ainda falta no seu servidor com base no
                que já foi feito com a nossa empresa.
                <br><br>
                Vale ressaltar que o painel ainda está em desenvolvimento. Todas as funções visíveis estão em funcionamento, entretanto, estamos desenvolvendo diversos sistemas animados e competitivos
                para os nossos clientes ficarem interados em nosso site!
                <br><br>
                As contas na DevHabbos são geradas por um Administrador!
              </div>
            </div>

          </div>

        </div>
      </div>{{-- End Content --}}
  
@endsection