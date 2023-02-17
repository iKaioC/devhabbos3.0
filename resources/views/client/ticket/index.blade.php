@extends('layouts.client')

@section('content')

  <link rel="stylesheet" href="{{ asset('client/css/ticketstable.css') }}">

  <div>

    @if(session('message'))
      <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session()->has('error'))
      <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('error') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    {{-- Page Title --}}
    <div class="pagetitle">
      <h1>Tickets</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('client-dashboard') }}">Home</a></li>
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
            <h5>Meus Tickets
              <a href="{{ route('tickets-create') }}" class="btn btn-primary float-end">
                <i class="bi bi-ticket-detailed"></i> Abrir Ticket
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
                                  <th scope="col">Título</th>
                                  <th scope="col">Categoria</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Prioridade</th>
                                  <th scope="col">Ver</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  @foreach ($tickets as $ticket)
                                    <td style="font-size: 14px;">{{ $ticket->title }}</td>
                                    <td style="font-size: 14px;">{{ $ticket->category }}</td>

                                    @if ($ticket->status == 'Aberto')
                                      <td style="font-size: 14px;">
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Aberto</span>
                                      </td>
                                    @elseif ($ticket->status == 'Fechado')
                                      <td style="font-size: 14px;">
                                        <span class="badge bg-secondary"><i class="bi bi-collection me-1"></i> Fechado</span>
                                      </td>
                                    @elseif ($ticket->status == 'Pendente')
                                      <td style="font-size: 14px;">
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Pendente</span>
                                      </td>
                                    @endif

                                    @if ($ticket->priority == 'Alta')
                                      <td class="text-danger" style="font-size: 14px;">
                                        <strong>{{ $ticket->priority }}</strong>
                                      </td>
                                    @elseif ($ticket->priority == 'Média')
                                      <td class="text-warning" style="font-size: 14px;">
                                        <strong>{{ $ticket->priority }}</strong>
                                      </td>
                                    @elseif ($ticket->priority == 'Baixa')
                                      <td class="text-success" style="font-size: 14px;">
                                        <strong>{{ $ticket->priority }}</strong>
                                      </td>
                                    @endif

                                    <td>
                                      <a href="{{ route('tickets-update', $ticket->id) }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-eye"></i>
                                      </a>
                                    </td>
                                  @endforeach
                                </tr>
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