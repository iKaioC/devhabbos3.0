@extends('layouts.admin')

@section('title', 'Adicionar novo Opcional')

@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Opcionais Habbo</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-optionals') }}">Opcionais</a></li>
        <li class="breadcrumb-item active">Criar Novo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Adicionar novo Opcional Habbo
            <a href="{{ route('admin-optionals') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-optional') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf

            <div class="col-md-6">
              <label class="form-label">Nome</label>
              <input type="text" name="name" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control">
              @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Categoria</label>
              <select name="category" id="category" class="form-select">
                <option value="Habbo">Habbo</option>
                <option value="Windows">Windows</option>
                <option value="Outro">Outro</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag1</label>
              <input type="text" name="tag1" class="form-control">
              @error('tag1')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag2</label>
              <input type="text" name="tag2" class="form-control">
              @error('tag2')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag3</label>
              <input type="text" name="tag3" class="form-control">
              @error('tag3')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor</label>
              <input type="text" name="price" class="form-control">
              @error('price')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Repositório</label>
              <input type="text" name="repository" class="form-control">
              @error('repository')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Ícone</label>
              <select name="icon" id="icon" class="form-select">
                <option value="bx bx-server">Server Icon</option>
                <option value="bx bx-globe">Globe Icon</option>
                <option value="bx bx-data">Data Icon</option>
                <option value="bx bx-game">Game Icon</option>
                <option value="bx bxl-html5">Html5 Icon</option>
                <option value="bx bxl-microsoft">Windows Icon</option>
                <option value="bx bxs-tv">Furni Icon</option>
                <option value="bx bx-plug">Plugin Icon</option>
                <option value="bx bxs-cloud">Cloud Icon</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Cor</label>
              <select name="color" id="color" class="form-select">
                <option value="icon-box-pink">Cor Rosa</option>
                <option value="icon-box-cyan">Cor Azul-esverdeado</option>
                <option value="icon-box-green">Cor Verde</option>
                <option value="icon-box-blue">Cor Azul</option>
                <option value="icon-box-orange">Cor Laranja</option>
                <option value="icon-box-purple">Cor Roxa</option>
              </select>
            </div>

            <div class="col-md-12">
              <label class="form-label">Imagens</label>
              <input type="file" name="images[]" class="form-control" multiple>
              @error('images')<small class="text-danger">{{ $message }}</small>@enderror
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