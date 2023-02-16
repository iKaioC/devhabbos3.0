@extends('layouts.admin')

@section('title', 'Adicionar novo Cliente')

@section('content')

  <link rel="stylesheet" href="{{ asset('admin/css/clientcreate.css') }}">

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Clientes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Adicionar Cliente</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Adicionar novo cliente
            <a href="{{ route('admin-clients') }}" class="btn btn-primary float-end btn-sm">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>
      </div>
    </div>

    {{-- VerticalForm --}}
    <form action="{{ route('store-client') }}" method="POST" class="row g-3">
      @csrf
      <div class="container">
        <div class="row gutters">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Detalhes do Cliente</h6>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="form-group">
                      <label for="name" class="">Nome</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do cliente">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Digite o email do cliente">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="form-group">
                      <label for="password">Senha</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Enter phone number">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="rank">Rank</label>
                      <select class="form-control" name="rank" id="rank">
                        <option value="Membro Bronze">Membro Bronze</option>
                        <option value="Membro Prata">Membro Prata</option>
                        <option value="Membro Ouro">Membro Ouro</option>
                        <option value="Membro Diamante">Membro Diamante</option>
                        <option value="Membro Platina">Membro Platina</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="cell">Celular</label>
                      <input type="text" class="form-control" name="cell" id="cell" placeholder="Digite o celular do cliente">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="link">Link do Servidor</label>
                      <input type="text" class="form-control" name="link" id="link" placeholder="Digite o link do servidor do cliente">
                    </div>
                  </div>
                </div>

                <div class="row gutters mt-3">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-check-lg"></i> Cadastrar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- Vertical Form --}}
  </div>
  {{-- End Content --}}
  
@endsection