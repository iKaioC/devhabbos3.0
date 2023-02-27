@extends('layouts.admin')
@section('title', 'Editar Habbo do Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Editando Habbo do: {{ $user->name }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Editar Habbo Cliente</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editando Habbo do: {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-habbo-client', $userHabbo->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-6">
              <label class="form-label">Cliente</label>
              <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" disabled>
              @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Servidor Habbo</label>
              <select name="habbo_id" id="habbo_id" class="form-select">
                @foreach($habbos as $habbo)
                  <option value="{{ $habbo->id }}" @if($habbo->id == $userHabbo->habbo_id) selected @endif>{{ $habbo->name }} ({{ $habbo->cms }})</option>
                @endforeach
              </select>
              @error('habbo_id')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Idioma</label>
              <select name="product_type" id="product_type" class="form-select">
                <option value="Inglês" @if($userHabbo->product_type == 'Inglês') selected @endif>Inglês</option>
                <option value="Português" @if($userHabbo->product_type == 'Português') selected @endif>Português</option>
              </select>
              @error('product_type')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Finalizado" @if($userHabbo->status == 'Finalizado') selected @endif>Finalizado</option>
                <option value="Pendente" @if($userHabbo->status == 'Pendente') selected @endif>Pendente</option>
                <option value="Cancelado" @if($userHabbo->status == 'Cancelado') selected @endif>Cancelado</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" value="{{ $userHabbo->pay }}" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Suporte</label>
              <input type="text" name="supportdate" class="form-control" value="{{ $userHabbo->supportdate->format('d/m/Y') }}">
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