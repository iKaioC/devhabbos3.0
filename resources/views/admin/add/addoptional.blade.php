@extends('layouts.admin')
@section('title', 'Adicionar Opcional ao Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Novo Opcional ao Cliente</h1>
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
          <h5 class="mt-1">Novo Opcional ao Cliente
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-optional-client') }}" method="POST" class="row g-3">
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
              <label class="form-label">Opcional</label>
              <select name="optional_id" id="optional_id" class="form-select">
                @foreach($optionals as $optional)
                  <option value="{{ $optional->id }}">{{ $optional->name }} ({{ $optional->category }})</option>
                @endforeach
              </select>
              @error('optional_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tipo</label>
              <select name="product_type" id="product_type" class="form-select">
                <option value="Windows">Windows</option>
                <option value="Habbo">Habbo</option>
                <option value="Outro">Outro</option>
              </select>
              @error('product_type')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Finalizado">Finalizado</option>
                <option value="Pendente">Pendente</option>
                <option value="Cancelado">Cancelado</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Suporte</label>
              <input type="text" name="supportdate" class="form-control" placeholder="dd/mm/aaaa">
              @error('supportdate')<small class="text-danger">{{ $message }}</small>@enderror
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