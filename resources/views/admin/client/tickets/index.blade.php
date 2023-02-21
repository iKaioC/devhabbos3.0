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
        <h1>Tickets dos Clientes</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Tickets</li>
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
                  <th>ID</th>
                  <th>Título</th>
                  <th>Categoria</th>
                  <th>Prioridade</th>
                  <th>Cliente</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($tickets as $ticket)
                  <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Deletar Ticket</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="#" method="post">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            Você tem certeza que deseja deletar este ticket?
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
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->category }}</td>

                    <td>
                      @if ($ticket->priority == 'Alta')
                        <span class="text-danger">Alta</span>
                      @elseif ($ticket->priority == 'Média')
                        <span class="text-warning">Média</span>
                      @elseif ($ticket->priority == 'Baixa')
                        <span class="text-secondary">Baixa</span>
                      @endif
                    </td>

                    <td>{{ $ticket->user->name }}</td>

                    <td>
                      @if ($ticket->status == 'Aberto')
                        <span class="text-success">Aberto</span>
                      @elseif ($ticket->status == 'Pendente')
                        <span class="text-warning">Pendente</span>
                      @elseif ($ticket->status == 'Fechado')
                        <span class="text-secondary">Fechado</span>
                      @endif
                    </td>

                    <td>
                      <a href="{{ route('tickets-update-admin', $ticket->id) }}" class="btn btn-success btn-sm">
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