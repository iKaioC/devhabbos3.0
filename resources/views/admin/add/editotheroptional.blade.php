@extends('layouts.admin')
@section('title', 'Editar Outro Opcional do Cliente')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Editando Outro Opcional do: {{ $user->name }}</h1>
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
          <h5 class="mt-1">Editando Outro Opcional do: {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-otheroptional-client', $userOptional->id) }}" method="POST" class="row g-3">
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
              <input type="text" name="name" value="{{ $userOptional->name }}" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Categoria</label>
              <select name="category" id="category" class="form-select">
                <option value="Windows" @if($userOptional->category == 'Windows') selected @endif>Windows</option>
                <option value="Habbo" @if($userOptional->category == 'Habbo') selected @endif>Habbo</option>
                <option value="Outro" @if($userOptional->category == 'Outro') selected @endif>Outro</option>
              </select>
              @error('category')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor Pago</label>
              <input type="text" name="pay" value="{{ $userOptional->pay }}" class="form-control">
              @error('pay')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea class="form-control" name="description" id="description" rows="5" cols="30">{{ $userOptional->description }}</textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" id="status" class="form-select">
                <option value="Concluído" @if($userOptional->status == 'Concluído') selected @endif>Concluído</option>
                <option value="Pendente" @if($userOptional->status == 'Pendente') selected @endif>Pendente</option>
                <option value="Cancelado" @if($userOptional->status == 'Cancelado') selected @endif>Cancelado</option>
              </select>
              @error('status')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Data de Suporte</label>
              <input type="text" name="supportdate" class="form-control" value="{{ $userOptional->supportdate }}">
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