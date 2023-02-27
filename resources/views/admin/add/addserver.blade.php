@extends('layouts.admin')
@section('title', 'Adicionar VPS ao Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Novo VPS ao Cliente</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Add Novo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Novo VPS ao Cliente
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-server-client') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
              <label class="form-label">Cliente</label>
              <select name="email" id="email" class="form-select">
                @foreach($users as $user)
                  <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
              </select>
              @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Servidor Habbo</label>
              <select name="server_id" id="server_id" class="form-select">
                @foreach($servers as $server)
                  <option value="{{ $server->id }}">{{ $server->name }} ({{ $server->memory }})</option>
                @endforeach
              </select>
              @error('server_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">DataCenter</label>
              <select name="product_type" id="product_type" class="form-select">
                <option value="Canadá">Canadá</option>
                <option value="Brasil">Brasil</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Finalizado">Finalizado</option>
                <option value="Pendente">Pendente</option>
                <option value="Cancelado">Cancelado</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Vencimento</label>
              <input type="text" name="duedate" class="form-control" placeholder="dd/mm/aaaa">
              @error('duedate')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-sm float-end">
                <i class="bi bi-check-lg"></i> Adicionar
              </button>
            </div>
          </form>
          {{-- Vertical Form --}}
        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}
@endsection