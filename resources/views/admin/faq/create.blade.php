@extends('layouts.admin')
@section('title', 'Adicionar nova FAQ')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Adicionar Perguntas Frequentes</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-faqs') }}">Arquivos</a></li>
      <li class="breadcrumb-item active">Criar Nova FAQ</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Adicionar Perguntas Frequentes
            <a href="{{ route('admin-faqs') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body">
          {{-- VerticalForm --}}
          <form action="{{ route('store-faq') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
              <label class="form-label">Título</label>
              <input type="text" name="title" class="form-control">
              @error('title')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="col-md-12">
              <label class="form-label">Descrição</label>
              <textarea name="description" class="form-control" rows="3"></textarea>
              @error('description')<small class="text-danger">{{ $message }}</small>@enderror
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