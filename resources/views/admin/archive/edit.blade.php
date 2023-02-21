@extends('layouts.admin')
@section('title', 'Editando: '.$archive->name)
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
        <li class="breadcrumb-item active">Editar Arquivo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editar {{ $archive->name }}
            <a href="{{ route('admin-archives') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-archive', $archive->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
              <label class="form-label">Nome</label>
              <input type="text" name="name" value="{{ $archive->name }}" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Slug</label>
              <input type="text" name="slug" value="{{ $archive->slug }}" class="form-control">
              @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" id="" rows="3">{{ $archive->description }}</textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Link</label>
              <input type="text" name="link" value="{{ $archive->link }}" class="form-control">
              @error('link')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            @if ($archive->image == '')
              <div class="col-md-6">
                <label class="form-label">Imagem</label>
                <input type="file" name="image" class="form-control">
                @error('link')<small class="text-danger">{{ $message }}</small>@enderror
              </div>

              <div class="col-md-12 text-center">
                <label class="form-label">Este arquivo não possúi uma imagem, adicione acima.</label>
              </div>
            @else
              <div class="col-md-6">
                <label class="form-label">Atualizar Imagem</label>
                <input type="file" name="image" class="form-control">
                @error('link')<small class="text-danger">{{ $message }}</small>@enderror
              </div>

              <div class="col-md-12">
                <img src="{{ asset('web/archives/'.$archive->image) }}" width="300" alt="{{ $archive->name }}">
              </div>
            @endif

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