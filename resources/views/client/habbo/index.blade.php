@extends('layouts.client')
@section('title', 'Meus Habbos')
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
      <h1>Meus Servidores Habbo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('client-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Servers Habbo</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Meus Servidores Habbo
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
                                  <th scope="col">Tipo</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Suporte até</th>
                                  <th scope="col">Preço</th>
                                  <th scope="col">Ver</th>
                                </tr>
                              </thead>

                              <tbody>
                                @foreach ($habbos as $habbo)
                                  <div class="modal fade" id="habbosinfo{{ $habbo->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Informações</h5>
                                          
                                          @if ($habbo->status == 'Ativo')
                                          <span class="btn btn-success float-right">
                                            {{ $habbo->status }}
                                          </span>
                                          @endif

                                          @if ($habbo->status == 'Pendente')
                                            <span class="btn btn-warning float-right">
                                              {{ $habbo->status }}
                                            </span>
                                          @endif

                                          @if ($habbo->status == 'Cancelado')
                                            <span class="btn btn-secondary float-right">
                                              {{ $habbo->status }}
                                            </span>
                                          @endif
                                        </div>

                                        <div class="modal-body">
                                          <ul class="list-group">
                                            <li class="list-group-item">
                                              <i class="bi bi-book me-1 text-primary"></i>
                                              <b>Nome do Serviço:</b> {{ $habbo->name }}
                                            </li>

                                            <li class="list-group-item">
                                              <i class="bi bi-database me-1 text-danger"></i>
                                              <b>Emulador:</b> {{ $habbo->emulator }}
                                            </li>

                                            <li class="list-group-item">
                                              <i class="bi bi-window-fullscreen me-1 text-warning"></i>
                                              <b>CMS:</b> {{ $habbo->cms }}
                                            </li>

                                            <li class="list-group-item">
                                              <i class="bi bi-ticket-detailed me-1 text-info"></i>
                                              <b>Idioma:</b> {{ $habbo->language }}
                                            </li>

                                            <h5 class="modal-title mt-3">Pagamento</h5>

                                            <hr>

                                            <li class="list-group-item">
                                              <i class="bi bi-check-circle me-1 text-success"></i>
                                              <b>Valor Original:</b> R$ {{ $habbo->price }} Reais
                                            </li>

                                            <li class="list-group-item">
                                              <i class="bi bi-currency-dollar me-1 text-success"></i>
                                              <b>Valor Pago:</b> R$ {{ $habbo->pay }} Reais
                                            </li>

                                            <h5 class="modal-title mt-3">Suporte</h5>

                                            <hr>

                                            <li class="list-group-item">
                                              <i class="bi bi-calendar me-1 text-primary"></i>
                                              <b>Suporte até:</b> {{ $habbo->supportdate }}
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
                                    <td style="font-size: 14px;">
                                      {{ $habbo->name }}
                                    </td>

                                    <td style="font-size: 14px;">
                                      {{ $habbo->product_type }}
                                    </td>

                                    <td>
                                      @if ($habbo->status === 'Ativo')
                                        <span class="badge border-success border-1 text-success">
                                          {{ $habbo->status }}
                                        </span>
                                      @elseif ($habbo->status === 'Pendente')
                                        <span class="badge border-warning border-1 text-warning">
                                          {{ $habbo->status }}
                                        </span>
                                      @elseif ($habbo->status === 'Cancelado')
                                        <span class="badge border-secondary border-1 text-secondary">
                                          {{ $habbo->status }}
                                        </span>
                                      @endif
                                    </td>

                                    <td>
                                      <span class="badge bg-primary">
                                        {{ $habbo->supportdate }}
                                      </span>
                                    </td>

                                    <td>
                                      <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i> 
                                        R$ {{ $habbo->price }}
                                      </span>
                                    </td>

                                    <td>
                                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#habbosinfo{{ $habbo->id }}">
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