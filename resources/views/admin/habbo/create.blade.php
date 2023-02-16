@extends('layouts.admin')
@section('title', 'Adicionar Novo Habbo')
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
          <h5 class="mt-1">Adicionar novo Habbo
            <a href="{{ route('admin-habbos') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-habbo') }}" method="POST" class="row g-3">
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

            <div class="col-md-6">
              <label class="form-label">Emulador</label>
              <select name="emulator" id="emulator" class="form-select">
                <option value="Arcturus 3.5.1">Arcturus 3.5.1</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">CMS</label>
              <select name="cms" id="cms" class="form-select">
                <option value="Cosmic CMS">Cosmic CMS</option>
                <option value="Atom CMS">Atom CMS</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">Linguagem</label>
              <select name="language" id="language" class="form-select">
                <option value="Inglês">Inglês</option>
                <option value="Português">Português</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label">URL (Demonstração)</label>
              <input type="text" name="url" class="form-control">
              @error('url')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-2">
              <label class="form-label">Valor</label>
              <input type="text" name="price" class="form-control">
              @error('price')<small class="text-danger">{{ $message }}</small>@enderror
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