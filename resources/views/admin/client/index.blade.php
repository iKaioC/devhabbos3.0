@extends('layouts.admin')
@section('title', 'Lista de Clientes')
@section('content')
  <div>
    @if(session('message'))
      <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    {{-- Page Title --}}
      <div class="pagetitle">
        <h1>Clientes (Usuários)</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
        </nav>
      </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mt-1">Clientes
              <a href="{{ route('create-client') }}" class="btn btn-primary btn-sm float-end">
                <i class="bi bi-person-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Rank</th>
                  <th>VPS</th>
                  <th>Habbos</th>
                  <th>Opcionais</th>
                  <th>Outros</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($users as $user)
                  <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Deletar Usuário</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="#" method="post">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            Você tem certeza que deseja deletar este arquivo?
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-danger">Sim, deletar!</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <tr>
                    <td>
                      <a href="{{ route('edit-client', $user->id) }}">
                        {{ $user->name }}
                      </a>
                    </td>
                    <td>{{ $user->rank }}</td>

                    <td>
                      <a href="{{ route('client-vps-admin', $user->id) }}" class="btn btn-secondary mb-2 btn-sm">
                        VPS <span class="badge bg-white text-secondary">{{ $user->servers()->count() }}</span>
                      </a>
                    </td>

                    <td>
                      <a href="{{ route('client-habbos-admin', $user->id) }}" class="btn btn-warning mb-2 btn-sm">
                        Habbos <span class="badge bg-white text-warning">{{ $user->habbos()->count() }}</span>
                      </a>
                    </td>

                    <td>
                      <a href="{{ route('client-optionals-admin', $user->id) }}" class="btn btn-danger mb-2 btn-sm">
                        Opcionais <span class="badge bg-white text-danger">{{ $user->optionals()->count() }}</span>
                      </a>
                    </td>

                    <td>
                      <a href="{{ route('client-otheroptionals-admin', $user->id) }}" class="btn btn-info mb-2 btn-sm">
                          Outros <span class="badge bg-white text-info">{{ $otheroptionals[$user->id] ?? 0 }}</span>
                      </a>
                    </td>

                    <td>
                      @if ($user->status == 'active')
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ativa</span>
                      @elseif ($user->status == 'inactive')
                      <span class="badge bg-secondary"><i class="bi bi-collection me-1"></i> Inativa</span>
                      @endif
                    </td>

                    <td>
                      <a href="{{ route('edit-client', $user->id) }}" class="btn btn-success btn-sm">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection