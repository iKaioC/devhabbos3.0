@extends('layouts.admin')
@section('title', 'Servidores do '.$user->name)
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Servidores VPS de: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">VPS em uso</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Servidores VPS de: {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-danger float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body mt-3">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Servidor</th>
                <th>Memória</th>
                <th>IP</th>
                <th>Status</th>
                <th>Vencimento</th>
                <th>Valor Pago</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($servers as $server)
                <tr>
                  <td><span class="badge border-danger border-1 text-danger">{{ $user->name }}</span></td>
                  <td><span class="badge border-secondary border-1 text-secondary">{{ $server->name }}</span></td>
                  <td><span class="badge border-secondary border-1 text-secondary">{{ $server->memory }}</span></td>
                  <td><span class="badge border-secondary border-1 text-secondary">{{ $server->pivot->ipserver }}</span></td>
                  <td>
                    @if ($server->pivot->status == 'Ativo')
                      <span class="badge bg-success">Ativo</span>
                    @elseif ($server->pivot->status == 'Pendente')
                      <span class="badge bg-warning">Pendente</span>
                    @elseif ($server->pivot->status == 'Cancelado')
                      <span class="badge bg-secondary">Cancelado</span>
                    @endif
                  </td>
                  <td><span class="badge border-secondary border-1 text-secondary">{{ $server->pivot->duedate }}</span></td>
                  <td>
                    <span class="badge bg-success">
                      <i class="bi bi-currency-dollar"></i> {{ $server->pivot->pay }}
                    </span>
                  </td>
                  @foreach ($user->userServers as $userServer)
                    <td>
                      <a href="{{ route('edit-server-client', $userServer->id) }}" class="btn btn-success btn-sm sm">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}

@endsection