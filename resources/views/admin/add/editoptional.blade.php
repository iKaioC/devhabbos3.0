@extends('layouts.admin')
@section('title', 'Editar Opcional do Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Editando Opcional do: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Editar Opcional Cliente</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editando Opcional do: {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-optional-client', $userOptional->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-6">
              <label class="form-label">Cliente</label>
              <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" disabled>
              @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Opcional</label>
              <select name="optional_id" id="optional_id" class="form-select">
                @foreach($optionals as $optional)
                  <option value="{{ $optional->id }}" @if($optional->id == $userOptional->optional_id) selected @endif>{{ $optional->name }} ({{ $optional->cms }})</option>
                @endforeach
              </select>
              @error('optional_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tipo</label>
              <select name="product_type" id="product_type" class="form-select">
                <option value="Windows" @if($userOptional->product_type == 'Windows') selected @endif>Windows</option>
                <option value="Habbo" @if($userOptional->product_type == 'Habbo') selected @endif>Habbo</option>
                <option value="Outro" @if($userOptional->product_type == 'Outro') selected @endif>Outro</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Finalizado" @if($userOptional->status == 'Finalizado') selected @endif>Finalizado</option>
                <option value="Pendente" @if($userOptional->status == 'Pendente') selected @endif>Pendente</option>
                <option value="Cancelado" @if($userOptional->status == 'Cancelado') selected @endif>Cancelado</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" value="{{ $userOptional->pay }}" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Suporte</label>
              <input type="text" name="supportdate" class="form-control" value="{{ $userOptional->supportdate->format('d/m/Y') }}">
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