@extends('layouts.admin')

@section('content')

  <style>
    body {
    margin: 0;
    padding-top: 40px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

  </style>

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
          <h4>Adicionar novo cliente
            <a href="{{ route('admin-clients') }}" class="btn btn-primary float-end">
              <i class="bi bi-database-add"></i> Voltar
            </a>
          </h4>
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
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
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
                      <button type="submit" class="btn btn-primary">
                        Cadastrar
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