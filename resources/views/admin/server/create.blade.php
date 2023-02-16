@extends('layouts.admin')
@section('title', 'Adicionar nova VPS')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Servidores VPS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-servers') }}">Servers</a></li>
        <li class="breadcrumb-item active">Adicionar novo VPS</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Adicionar novo VPS
            <a href="{{ route('admin-servers') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-server') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
              <label class="form-label">Nome</label>
              <input type="text" name="name" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Memória RAM</label>
              <input type="text" name="memory" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">vCPU</label>
              <input type="text" name="vcpu" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tipo de Armazenamento</label>
              <select name="type_storage" id="type_storage" class="form-select">
                <option value="SSD">SSD</option>
                <option value="NVME">NVME</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Quantia de Armazenamento</label>
              <input type="text" name="amount_storage" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Sistema Operacional</label>
              <select name="system" id="system" class="form-select">
                <option value="Windows ou Linux">Windows ou Linux</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">DataCenter</label>
              <select name="locale" id="locale" class="form-select">
                <option value="Canadá">Canadá</option>
                <option value="Brasil">Brasil</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor</label>
              <input type="text" name="price" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Estoque</label>
              <select name="stock" id="stock" class="form-select">
                <option value="1">Disponível</option>
                <option value="0">Indisponível</option>
              </select>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary float-end btn-sm">
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