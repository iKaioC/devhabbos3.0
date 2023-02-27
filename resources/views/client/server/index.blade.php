@extends('layouts.client')
@section('title', 'Meus Servers')
@section('content')

<link rel="stylesheet" href="{{ asset('client/css/ticketstable.css') }}">

  <div>

    @if(session('message'))
      <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    {{-- Page Title --}}
    <div class="pagetitle">
      <h1>Meus Servidores VPS</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('client-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Servers VPS</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Meus Servidores VPS
              <a href="{{ route('client-dashboard') }}" class="btn btn-primary float-end">
                <i class="bi bi-arrow-left"></i> Voltar
              </a>
            </h5>
          </div>

          <section class="intro mt-3">
            <div class="bg-image h-100" style="background-color: #f5f7fa;">
              <div class="mask d-flex align-items-center h-100">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body p-0">
                          <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: auto">
                            <table class="table table-striped mb-0">
                              <thead style="background-color: #304ba7;">
                                <tr>
                                  <th scope="col">Nome</th>
                                  <th scope="col">Memória</th>
                                  <th scope="col">SSD</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Vencimento</th>
                                  <th scope="col">Preço</th>
                                  <th scope="col">Ver</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach ($servers as $server)
                                  <div class="modal fade" id="serversinfo{{ $server->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Informações da VPS</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                          <ul class="list-group">
                                            <li class="list-group-item">
                                              <i class="bi bi-book me-1 text-primary"></i>
                                              <b>Nome do Serviço:</b> {{ $server->name }}
                                              </li>

                                              <li class="list-group-item">
                                                <i class="bi bi-memory me-1 text-danger"></i>
                                                <b>Memória RAM:</b> {{ $server->memory }}
                                              </li>

                                              <li class="list-group-item">
                                                <i class="bi bi-cpu me-1 text-secondary"></i>
                                                <b>vCPU:</b> {{ $server->vcpu }}
                                              </li>

                                              <li class="list-group-item">
                                                <i class="bi bi-device-hdd me-1 text-warning"></i>
                                                <b>DataCenter:</b> {{ $server->locale }}
                                              </li>

                                              <li class="list-group-item">
                                                <i class="bi bi-ticket-detailed me-1 text-info"></i>
                                                <b>Status:</b> {{ $server->status }}
                                              </li>

                                              <li class="list-group-item">
                                                <i class="bi bi-check-circle me-1 text-success"></i>
                                                <b>Valor Pago:</b> R$ {{ $server->price }} Reais
                                              </li>

                                              <h5 class="modal-title mt-3">Dados da VPS</h5>
                                              <hr>

                                              <li class="list-group-item">
                                                <i class="bi bi-pass me-1 text-primary"></i>
                                                <b>IP:</b> {{ $server->ipserver }}
                                              </li>

                                              
                                              <li class="list-group-item">
                                                <i class="bi bi-person me-1 text-primary"></i>
                                                <b>Usuário:</b> Administrator
                                              </li>
                                          </ul>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <tr>
                                    <td style="font-size: 14px;">{{ $server->name }}</td>
                                    <td style="font-size: 14px;">{{ $server->memory }}</td>
                                    <td style="font-size: 14px;">
                                      {{ $server->amount_storage }} {{ $server->type_storage }}
                                    </td>

                                    <td>
                                      <span class="badge border-{{ $server->status === 'Ativo' ? 'success' :   ($server->status === 'Cancelado' ? 'muted' : 'warning') }} border-1 text-{{ $server->status === 'Ativo' ? 'success' : ($server->status === 'Cancelado' ? 'muted' : 'warning') }}">
                                        {{ $server->status }}
                                      </span>
                                    </td>

                                    <td>
                                      <span class="badge bg-primary">
                                        {{ \Carbon\Carbon::parse($server->duedate)->format('d/m/Y')}}
                                      </span>
                                    </td>

                                    <td>
                                      <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i> 
                                        R$ {{ $server->price }}
                                      </span>
                                    </td>

                                    <td>
                                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#serversinfo{{ $server->id }}">
                                        <i class="bi bi-eye"></i>
                                      </button>
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
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

@endsection