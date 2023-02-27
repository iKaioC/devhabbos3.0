@extends('layouts.admin')
@section('title', 'Editando: '.$term->title)
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
        <li class="breadcrumb-item"><a href="{{ route('admin-terms') }}">Arquivos</a></li>
        <li class="breadcrumb-item active">Editar Termo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editar {{ $term->name }}
            <a href="{{ route('admin-terms') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-term', $term->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
              <label class="form-label">Título</label>
              <input type="text" name="title" value="{{ $term->title }}" class="form-control">
              @error('title')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Categoria</label>
              <select name="category" id="category" class="form-select">
                <option value="Serviços" {{ $term->category == "Serviços" ? 'selected' : '' }}>Serviços</option>
                <option value="VPS" {{ $term->category == "VPS" ? 'selected' : '' }}>VPS</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" id="" rows="3">{{ $term->description }}</textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary float-end btn-sm">
                <i class="bi bi-check-lg"></i> Atualizar
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