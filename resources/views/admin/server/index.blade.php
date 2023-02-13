@extends('layouts.admin')

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
      <h1>Servidores VPS - Canadá</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Servers Canadá</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Servidores VPS - SSD
              <a href="{{ route('create-server') }}" class="btn btn-primary float-end">
                <i class="bi bi-database-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Memória</th>
                  <th>Disco</th>
                  <th>vCPU</th>
                  <th>DataCenter</th>
                  <th>Valor</th>
                  <th>Estoque</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($servers as $server)

                <div class="modal fade" id="deleteModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Deletar Server (VPS)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
            
                      <form action="{{ route('server-destroy', $server->id) }}" method="post">
                        @csrf
                        @method('DELETE')
            
                        <div class="modal-body">
                          Você tem certeza que deseja deletar esta VPS?
                        </div>
            
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-danger">Sim, deletar!</button>
                        </div>
                      </form>
            
                    </div>
                  </div>
                </div>

                @if ($server->type_storage == 'SSD' AND $server->locale == 'Canadá')
                  <tr>
                    <td>{{ $server->name }}</td>
                    <td>{{ $server->memory }}</td>
                    <td>
                      {{ $server->amount_storage }} {{ $server->type_storage }}
                    </td>
                    <td>{{ $server->vcpu }}</td>
                    <td>{{ $server->locale }}</td>
                    <td>
                      <span class="badge bg-success">
                        <i class="bi bi-currency-dollar"></i> {{ $server->price }}
                      </span>
                    </td>
                    <td>
                      @if ($server->stock == '1')
                        <p class="text-success">Disponível</p>
                      @else
                        <p class="text-danger">Indisponível</p>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('edit-server', $server->id) }}" class="btn btn-success">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                      </a>
                    </td>
                  </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            <div>{{ $servers->links() }}</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Servidores VPS - NVME
              <a href="{{ route('create-server') }}" class="btn btn-primary float-end">
                <i class="bi bi-database-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Memória</th>
                  <th>Disco</th>
                  <th>vCPU</th>
                  <th>DataCenter</th>
                  <th>Valor</th>
                  <th>Estoque</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($servers as $server)
                @if ($server->type_storage == 'NVME' AND $server->locale == 'Canadá')
                  <tr>
                    <td>{{ $server->name }}</td>
                    <td>{{ $server->memory }}</td>
                    <td>
                      {{ $server->amount_storage }} {{ $server->type_storage }}
                    </td>
                    <td>{{ $server->vcpu }}</td>
                    <td>{{ $server->locale }}</td>
                    <td>
                      <span class="badge bg-success">
                        <i class="bi bi-currency-dollar"></i> {{ $server->price }}
                      </span>
                    </td>
                    <td>
                      @if ($server->stock == '1')
                        <p class="text-success">Disponível</p>
                      @else
                        <p class="text-danger">Indisponível</p>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('edit-server', $server->id) }}" class="btn btn-success">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                      </a>
                    </td>
                  </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            <div>{{ $servers->links() }}</div>
          </div>
        </div>
      </div>
    </div>
    {{-- End Content --}}

  </div>
  
@endsection