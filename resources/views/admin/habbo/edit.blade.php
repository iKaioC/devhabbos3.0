@extends('layouts.admin')

@section('title', 'Editando: '.$habbo->name)

@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Servidores Habbo</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-habbos') }}">Habbos</a></li>
        <li class="breadcrumb-item active">Editar Habbo</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Editar {{ $habbo->name }}
            <a href="{{ route('admin-habbos') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('update-habbo', $habbo->id) }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
              <label class="form-label">Nome</label>
              <input type="text" name="name" value="{{ $habbo->name }}" class="form-control">
              @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Slug</label>
              <input type="text" name="slug" value="{{ $habbo->slug }}" class="form-control">
              @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Emulador</label>
              <select name="emulator" id="emulator" class="form-select">
                @if ($habbo->emulator == "Arcturus 3.5.1")
                  <option value="Arcturus 3.5.1" selected>Arcturus 3.5.1</option>
                @endif
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">CMS</label>
              <select name="cms" id="cms" class="form-select">
                @if ($habbo->cms == "Cosmic CMS")
                  <option value="Cosmic CMS" selected>Cosmic CMS</option>
                  <option value="Atom CMS">Atom CMS</option>
                @elseif ($habbo->cms == "Atom CMS")
                  <option value="Cosmic CMS">Cosmic CMS</option>
                  <option value="Atom CMS" selected>Atom CMS</option>
                @endif
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Linguagem</label>
              <select name="language" id="language" class="form-select">
                @if ($habbo->language == "Inglês")
                  <option value="Inglês" selected>Inglês</option>
                  <option value="Português">Português</option>
                @elseif ($habbo->language == "Português")
                  <option value="Inglês">Inglês</option>
                  <option value="Português" selected>Português</option>
                @endif
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">URL (Demonstração)</label>
              <input type="text" name="url" value="{{ $habbo->url }}" class="form-control">
              @error('url')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" id="" rows="3">{{ $habbo->description }}</textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Valor</label>
              <input type="text" name="price" value="{{ $habbo->price }}" class="form-control">
              @error('price')<small class="text-danger">{{ $message }}</small>@enderror
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