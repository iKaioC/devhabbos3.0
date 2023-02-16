@extends('layouts.admin')
@section('title', 'Editando: '.$user->name)
@section('content')

  <link rel="stylesheet" href="{{ asset('admin/css/profileclient.css') }}">

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="pagetitle">
    <h1>Editar Usuário</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-clients') }}">Clientes</a></li>
        <li class="breadcrumb-item active">Editar Cliente</li>
      </ol>
    </nav>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5>Editando {{ $user->name }}
            <a href="{{ route('admin-clients') }}" class="btn btn-primary btn-sm float-end">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>
      </div>
    </div>

    <form action="{{ route('update-archive', $user->id) }}" method="POST" class="row g-3">
      @csrf
      @method('PUT')
      <div class="container">
        <div class="row gutters">
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="account-settings">
                  <div class="user-profile">
                    <div class="user-avatar mt-5">
                      @if ($user->image == '')
                        <img src="{{ asset('profile-images/default.png') }}" alt="{{ $user->name }}">
                      @else
                        <img src="{{ asset('profile-images/'.$user->image) }}" alt="{{ $user->name }}">
                      @endif
                    </div>

                    <h5 class="user-name">{{ $user->name }}</h5>
                    <h6 class="user-email">{{ $user->email }}</h6>
                  </div>

                  @if ($user->staff == '1')
                    <div class="about">
                      <h5>Administrador</h5>
                      <a href="{{ $user->link }}" target="_blank">
                        <p>{{ $user->link }}</p>
                      </a>
                    </div>
                  @else
                    <div class="about">
                      <h5>{{ $user->rank }}</h5>
                      <a href="{{ $user->link }}" target="_blank">
                        <p>{{ $user->link }}</p>
                      </a>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                    <h6 class="mb-2 text-primary">Detalhes Pessoais</h6>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="form-group">
                      <label for="name">Nome Completo</label>
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input disabled type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="form-group">
                      <label for="password">Senha</label>
                      <input type="text" class="form-control" name="password">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="rank">Rank</label>
                      <select class="form-control" name="rank" id="rank">
                        <option value="Membro Bronze" @if($user->rank == 'Membro Bronze') selected @endif>Membro Bronze</option>
                        <option value="Membro Prata" @if($user->rank == 'Membro Prata') selected @endif>Membro Prata</option>
                        <option value="Membro Ouro" @if($user->rank == 'Membro Ouro') selected @endif>Membro Ouro</option>
                        <option value="Membro Diamante" @if($user->rank == 'Membro Diamante') selected @endif>Membro Diamante</option>
                        <option value="Membro Platina" @if($user->rank == 'Membro Platina') selected @endif>Membro Platina</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="cell">Celular</label>
                      <input type="text" class="form-control" name="cell" value="{{ $user->cell }}">
                    </div>
                  </div>
  
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="link">Link do Servidor</label>
                      <input type="text" class="form-control" name="link" value="{{ $user->link }}">
                    </div>
                  </div>

                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="bi bi-check-lg"></i> Atualizar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

@endsection