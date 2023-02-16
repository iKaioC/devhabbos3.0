@extends('layouts.admin')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

    {{-- Page Title --}}
    <div class="pagetitle">
      <h1>Servidores VPS em uso</h1>
      <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">VPS em uso</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Servidores VPS em uso - CANADÁ
              <a href="#" class="btn btn-primary float-end">
                <i class="bi bi-database-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Servidor</th>
                  <th>Memória</th>
                  <th>DataCenter</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($usersWithServers as $user)
                  @foreach ($user->servers as $server)
                    @if ($server->locale == 'Canadá')
                      @if ($user->usedServers->contains($server->id))
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $server->name }}</td>
                          <td>{{ $server->memory }}</td>
                          <td>{{ $server->locale }}</td>
                          <td>
                            <span class="badge bg-success">
                              <i class="bi bi-currency-dollar"></i> {{ $server->price }}
                            </span>
                          </td>
                          <td>
                            <a href="" class="btn btn-success">
                              <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="" class="btn btn-danger">
                              <i class="bi bi-trash3"></i>
                            </a>
                          </td>
                        </tr>
                      @endif
                    @endif
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- End Content --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Servidores VPS em uso - BRASIL
              <a href="#" class="btn btn-primary float-end">
                <i class="bi bi-database-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Servidor</th>
                  <th>Memória</th>
                  <th>DataCenter</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($usersWithServers as $user)
                  @foreach ($user->servers as $server)
                    @if ($server->locale == 'Brasil')
                      @if ($user->usedServers->contains($server->id))
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $server->name }}</td>
                          <td>{{ $server->memory }}</td>
                          <td>{{ $server->locale }}</td>
                          <td>
                          <span class="badge bg-success">
                          <i class="bi bi-currency-dollar"></i> {{ $server->price }}
                          </span>
                          </td>
                          <td>
                          <a href="" class="btn btn-success">
                          <i class="bi bi-pencil-square"></i>
                          </a>

                          <a href="" class="btn btn-danger">
                          <i class="bi bi-trash3"></i>
                          </a>
                          </td>
                        </tr>
                      @endif
                    @endif
                  @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- End Content --}}

@endsection