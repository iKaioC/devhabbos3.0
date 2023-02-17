@extends('layouts.admin')
@section('title', 'Editando: '.$optional->name)
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
        <li class="breadcrumb-item active">Editar Opcional</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editar {{ $optional->name }}
            <a href="{{ route('admin-optionals') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-optional', $optional->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
              <label class="form-label">Nome</label>
              <input type="text" name="name" value="{{ $optional->name }}" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Slug</label>
              <input type="text" name="slug" value="{{ $optional->slug }}" class="form-control">
              @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Categoria</label>
              <select name="category" id="category" class="form-select">
                <option value="Habbo" {{ $optional->category == "Habbo" ? 'selected' : '' }}>Habbo</option>
                <option value="Windows" {{ $optional->category == "Windows" ? 'selected' : '' }}>Windows</option>
                <option value="Outro" {{ $optional->category == "Outro" ? 'selected' : '' }}>Outro</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag1</label>
              <input type="text" name="tag1" value="{{ $optional->tag1 }}" class="form-control">
              @error('tag1')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag2</label>
              <input type="text" name="tag2" value="{{ $optional->tag2 }}" class="form-control">
              @error('tag2')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Tag3</label>
              <input type="text" name="tag3" value="{{ $optional->tag3 }}" class="form-control">
              @error('tag3')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor</label>
              <input type="text" name="price" value="{{ $optional->price }}" class="form-control">
              @error('price')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" id="" rows="3">{{ $optional->description }}</textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Ícone</label>
              <select name="icon" id="icon" class="form-select">
                <option value="bx bx-server" {{ $optional->icon == "bx bx-server" ? 'selected' : '' }}>Icon Server</option>
                <option value="bx bx-globe" {{ $optional->icon == "bx bx-globe" ? 'selected' : '' }}>Icon Globe</option>
                <option value="bx bx-data" {{ $optional->icon == "bx bx-data" ? 'selected' : '' }}>Icon Data</option>
                <option value="bx bx-game" {{ $optional->icon == "bx bx-game" ? 'selected' : '' }}>Icon Game</option>
                <option value="bx bxl-html5" {{ $optional->icon == "bx bxl-html5" ? 'selected' : '' }}>Icon Html5</option>
                <option value="bx bxl-microsoft" {{ $optional->icon == "bx bxl-microsoft" ? 'selected' : '' }}>Icon Microsoft</option>
                <option value="bx bxs-tv" {{ $optional->icon == "bx bxs-tv" ? 'selected' : '' }}>Icon Furni</option>
                <option value="bx bx-plug" {{ $optional->icon == "bx bx-plug" ? 'selected' : '' }}>Icon Plugin</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Cor</label>
              <select name="color" id="color" class="form-select">
                <option value="icon-box-pink" {{ $optional->color == "icon-box-pink" ? 'selected' : '' }}>Cor Rosa</option>
                <option value="icon-box-cyan" {{ $optional->color == "icon-box-cyan" ? 'selected' : '' }}>Cor Cyan</option>
                <option value="icon-box-green" {{ $optional->color == "icon-box-green" ? 'selected' : '' }}>Cor Verde</option>
                <option value="icon-box-blue" {{ $optional->color == "icon-box-blue" ? 'selected' : '' }}>Cor Azul</option>
                <option value="icon-box-orange" {{ $optional->color == "icon-box-orange" ? 'selected' : '' }}>Cor Laranja</option>
                <option value="icon-box-purple" {{ $optional->color == "icon-box-purple" ? 'selected' : '' }}>Cor Roxa</option>
              </select>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-sm float-end">
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