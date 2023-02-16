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
    <h1>Arquivos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-archives') }}">Arquivos</a></li>
        <li class="breadcrumb-item active">Criar Novo Arquivo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Adicionar novo Arquivo
            <a href="{{ route('admin-archives') }}" class="btn btn-primary float-end">
              <i class="bi bi-database-add"></i> Voltar
            </a>
          </h4>
        </div>

        <div class="card-body mt-3">

              {{-- VerticalForm --}}
              <form action="{{ route('store-archive') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-md-6">
                  <label class="form-label">Nome:</label>
                  <input type="text" name="name" class="form-control">
                  @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Slug:</label>
                  <input type="text" name="slug" class="form-control">
                  @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-12">
                  <label class="form-label">Descrição:</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                  @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Link:</label>
                  <input type="text" name="link" class="form-control">
                  @error('link')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary float-end">
                    <i class="bi bi-star"></i> Adicionar
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