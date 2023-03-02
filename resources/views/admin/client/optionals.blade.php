@extends('layouts.admin')
@section('title', 'Opcionais do '.$user->name)
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Opcionais de: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Opcionais criados</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Opcionais de: {{ $user->name }}
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
                <th>Opcional</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Suporte</th>
                <th>Valor Pago</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($optionals as $optional)
                <tr>
                  <td>
                    <span class="badge border-danger border-1 text-danger">
                      {{ $user->name }}
                    </span>
                  </td>
                  <td>
                    <span class="badge border-secondary border-1 text-secondary">
                      {{ $optional->name }}
                    </span>
                  </td>
                  <td>
                    @if ($optional->pivot->product_type == 'Windows')
                      <span class="badge border-primary border-1 text-primary">
                        Windows
                      </span>
                    @elseif ($optional->pivot->product_type == 'Habbo')
                      <span class="badge border-warning border-1 text-warning">
                        Habbo
                      </span>
                    @elseif ($optional->pivot->product_type == 'Outro')
                      <span class="badge bg-danger">Outro</span>
                      <span class="badge border-secondary border-1 text-secondary">
                        Outro
                      </span>
                    @endif
                  </td>
                  <td>
                    @if ($optional->pivot->status == 'Concluído')
                      <span class="badge bg-success">Concluído</span>
                    @elseif ($optional->pivot->status == 'Pendente')
                      <span class="badge bg-warning">Pendente</span>
                    @elseif ($optional->pivot->status == 'Cancelado')
                      <span class="badge bg-secondary">Cancelado</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge border-secondary border-1 text-secondary">{{ $optional->supportdate }}</span>
                  </td>
                  <td>
                    <span class="badge bg-success">
                      <i class="bi bi-currency-dollar"></i> {{ $optional->pivot->pay }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('edit-optional-client', $optional->userOptionals->first()->id) }}" class="btn btn-success btn-sm">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                  </td>
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