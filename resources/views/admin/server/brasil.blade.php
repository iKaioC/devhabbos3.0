@extends('layouts.admin')
@section('title', 'VPS Brasil')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Servidores VPS - Brasil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Servers Brasil</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Servidores VPS - NVME
            <a href="{{ route('create-server') }}" class="btn btn-primary float-end btn-sm">
              <i class="bi bi-device-hdd"></i> Adicionar
            </a>
          </h5>
        </div>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Memória</th>
                <th>Disco</th>
                <th>vCPU</th>
                <th>DataCenter</th>
                <th>Valor</th>
                <th>Estoque</th>
                <th>Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($servers as $server)
                @if ($server->type_storage == 'NVME' AND $server->locale == 'Brasil')
                  <tr>
                    <td>{{ $server->name }}</td>
                    <td>{{ $server->memory }}</td>
                    <td>
                      {{ $server->amount_storage }} {{ $server->type_storage }}
                    </td>
                    <td>{{ $server->vcpu }}</td>
                    <td>{{ $server->locale }}</td>
                    <td>
                      <span class="badge bg-success">
                        <i class="bi bi-currency-dollar"></i> {{ $server->price }}
                      </span>
                    </td>
                    <td>
                      @if ($server->stock == '1')
                        <p class="text-success">Disponível</p>
                      @else
                        <p class="text-danger">Indisponível</p>
                      @endif
                    </td>
                    <td>
                      <a href="" class="btn btn-success btn-sm">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3"></i>
                      </a>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}
  
@endsection