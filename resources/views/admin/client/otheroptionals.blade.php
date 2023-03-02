@extends('layouts.admin')
@section('title', 'Outros de '.$user->name)
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Outros de: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Outros criados</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Outros de: {{ $user->name }}
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
              @foreach ($otheroptionals as $optional)
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
                    @if ($optional->category == 'Habbo')
                      <span class="badge border-success border-1 text-success">Habbo</span>
                    @elseif ($optional->category == 'Windows')
                      <span class="badge border-warning border-1 text-warning">Windows</span>
                    @elseif ($optional->category == 'Outro')
                      <span class="badge border-secondary border-1 text-secondary">Outro</span>
                    @endif
                  </td>
                  <td>
                    @if ($optional->status == 'Concluído')
                      <span class="badge bg-success">Concluído</span>
                    @elseif ($optional->status == 'Pendente')
                      <span class="badge bg-warning">Pendente</span>
                    @elseif ($optional->status == 'Cancelado')
                      <span class="badge bg-secondary">Cancelado</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge border-secondary border-1 text-secondary">{{ $optional->supportdate }}</span>
                  </td>
                  <td>
                    <span class="badge bg-success">
                      <i class="bi bi-currency-dollar"></i> {{ $optional->pay }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('edit-otheroptional-client', $optional->id) }}" class="btn btn-success btn-sm">
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