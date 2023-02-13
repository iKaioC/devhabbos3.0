@extends('layouts.client')

@section('content')

  <div class="pagetitle">
    <h1>Perfil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Perfil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            @if(Auth::user()->image == '')
              <img src="{{ asset('profile-images/default.png') }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
            @else
              <img src="{{ asset('profile-images/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
            @endif

            <h2>{{ Auth::user()->name }}</h2>
            <span style="cursor: default;" class="btn btn-danger mb-2">
              <span class="badge bg-white text-danger">1</span> {{ Auth::user()->rank }}
            </span>
            <div class="social-links mt-2">
              <a href="{{ Auth::user()->link }}" target="_blank"><i class="bi bi-stripe"></i></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @elseif(session('message'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Início</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Alterar Senha</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Detalhes do perfil</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">País</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->country }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Celular</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->cell }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">URL do Servidor</div>
                  <div class="col-lg-9 col-md-8">
                    <a href="{{ Auth::user()->link }}" target="_blank">
                      {{ Auth::user()->link }}
                    </a>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status da Conta</div>
                  <div class="col-lg-9 col-md-8">

                    @if (Auth::user()->status == 'active')
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ativo</span>
                    @elseif (Auth::user()->status == 'inactive')
                      <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Desativado</span>
                    @endif
                    
                  </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('user-update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem de Perfil</label>
                    <div class="col-md-8 col-lg-9">
                      @if (Auth::user()->image == '')
                        <img src="{{ asset('profile-images/default.png') }}" alt="Profile">
                      @else
                        <img src="{{ asset('profile-images/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                      @endif


                      <div class="pt-2">
                        @if (Auth::user()->image == '')
                          <label for="image" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                          <input type="file" id="image" name="image" class="d-none">
                        @else
                          <a href="{{ route('user-remove-image') }}" class="btn btn-danger btn-sm" ><i class="bi bi-trash"></i></a>
                        @endif
                      </div>

                      
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" disabled type="text" class="form-control" id="email" value="{{ Auth::user()->email }}">
                    </div>
                  </div>

                  <hr>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" id="name">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="cell" class="col-md-4 col-lg-3 col-form-label">Celular</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="cell" type="tel" maxlength="15" onkeyup="handlePhone(event)" class="form-control tel" value="{{ Auth::user()->cell }}" id="cell">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="country" class="col-md-4 col-lg-3 col-form-label">País</label>
                    <div class="col-md-8 col-lg-9">
                      <select name="country" class="form-control">
                        @foreach ($countries as $country)
                          <option value="{{ $country->name }}" {{ Auth::user()->country == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="link" class="col-md-4 col-lg-3 col-form-label">URL do Hotel</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="link" type="text" class="form-control" id="link" value="{{ Auth::user()->link }}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">

                <!-- Change Password Form -->
                <form action="{{ route('user-change-password') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                      @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                      @if ($errors->has('newpassword'))
                        <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                      @endif
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Repita a nova senha</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword_confirmation" type="password" class="form-control" id="renewPassword">
                      @if ($errors->has('newpassword_confirmation'))
                        <span class="text-danger">{{ $errors->first('newpassword_confirmation') }}</span>
                      @endif
                    </div>
                  </div>
                
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
    const handlePhone = (event) => {
      let input = event.target
      input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
      if (!value) return ""
      value = value.replace(/\D/g,'')
      value = value.replace(/(\d{2})(\d)/,"($1) $2")
      value = value.replace(/(\d)(\d{4})$/,"$1-$2")
      return value
    }
  </script>

  
@endsection