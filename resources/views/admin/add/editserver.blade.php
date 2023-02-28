@extends('layouts.admin')
@section('title', 'Editar VPS do Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Editando VPS do: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Editar Server Cliente</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editando VPS do: {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-server-client', $userServer->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-6">
              <label class="form-label">Cliente</label>
              <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" disabled>
              @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Servidor VPS</label>
              <select name="server_id" id="server_id" class="form-select">
                @foreach($servers as $server)
                  <option value="{{ $server->id }}" @if($server->id == $userServer->server_id) selected @endif>{{ $server->name }} ({{ $server->memory }})</option>
                @endforeach
              </select>
              @error('server_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">DataCenter</label>
              <select name="product_type" id="product_type" class="form-select">
                <option value="Canadá" @if($userServer->product_type == 'Canadá') selected @endif>Canadá</option>
                <option value="Brasil" @if($userServer->product_type == 'Brasil') selected @endif>Brasil</option>
              </select>
              @error('product_type')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Ativo" @if($userServer->status == 'Ativo') selected @endif>Ativo</option>
                <option value="Pendente" @if($userServer->status == 'Pendente') selected @endif>Pendente</option>
                <option value="Cancelado" @if($userServer->status == 'Cancelado') selected @endif>Cancelado</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" value="{{ $userServer->pay }}" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">IP do Servidor</label>
              <input type="text" name="ipserver" value="{{ $userServer->ipserver }}" class="form-control">
              @error('ipserver')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de vencimento</label>
              <input type="text" name="duedate" class="form-control" value="{{ $userServer->duedate }}">
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