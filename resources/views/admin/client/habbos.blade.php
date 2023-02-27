@extends('layouts.admin')
@section('title', 'Habbos do '.$user->name)
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Habbos de: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Habbos criados</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Habbos de: {{ $user->name }}
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
                <th>Habbo</th>
                <th>CMS</th>
                <th>Idioma</th>
                <th>Status</th>
                <th>Valor Pago</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($habbos as $habbo)
                <tr>
                  <td>
                    <span class="badge border-danger border-1 text-danger">
                      {{ $user->name }}
                    </span>
                  </td>
                  <td>
                    <span class="badge border-secondary border-1 text-secondary">
                      {{ $habbo->name }}
                    </span>
                  </td>
                  <td>
                    <span class="badge border-primary border-1 text-primary">
                      {{ $habbo->cms }}
                    </span>
                  </td>
                  <td>
                    @if ($habbo->language == 'Inglês')
                      <span class="badge bg-secondary">Inglês</span>
                    @elseif ($habbo->language == 'Português')
                      <span class="badge bg-success">Português</span>
                    @endif
                  </td>
                  <td>
                    @if ($habbo->pivot->status == 'Finalizado')
                      <span class="badge bg-success">Finalizado</span>
                    @elseif ($habbo->pivot->status == 'Pendente')
                      <span class="badge bg-warning">Pendente</span>
                    @elseif ($habbo->pivot->status == 'Cancelado')
                      <span class="badge bg-secondary">Cancelado</span>
                    @endif
                  </td>
                  <td>
                    <span class="badge bg-success">
                      <i class="bi bi-currency-dollar"></i> {{ $habbo->pay }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('edit-habbo-client', $habbo->userHabbos->first()->id) }}" class="btn btn-success btn-sm">
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