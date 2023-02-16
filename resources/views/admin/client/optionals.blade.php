@extends('layouts.admin')
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
          <h5>Opcionais de: {{ $user->name }}
            <a href="{{ route('admin-dashboard') }}" class="btn btn-danger float-end">
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
                <th>Categoria</th>
                <th>Status</th>
                <th>Valor Pago</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($optionals as $optional)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $optional->name }}</td>
                  <td>{{ $optional->category }}</td>
                  <td>{{ $optional->pivot->status }}</td>
                  <td>{{ $optional->price }}</td>
                  <td>
                    <a href="" class="btn btn-success">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="" class="btn btn-danger">
                      <i class="bi bi-trash3"></i>
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