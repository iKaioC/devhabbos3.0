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
    <h1>Servidores VPS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-servers') }}">Servers</a></li>
        <li class="breadcrumb-item active">Editar Servidor</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Editar {{ $server->name }}
            <a href="{{ route('admin-servers') }}" class="btn btn-primary float-end">
              <i class="bi bi-database-add"></i> Voltar
            </a>
          </h4>
        </div>

        <div class="card-body mt-3">

              {{-- VerticalForm --}}
              <form action="{{ route('update-server', $server->id) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                  <label class="form-label">Nome:</label>
                  <input type="text" name="name" value="{{ $server->name }}" class="form-control">
                  @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Memória RAM:</label>
                  <input type="text" name="memory" value="{{ $server->memory }}" class="form-control">
                  @error('memory')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">vCPU:</label>
                  <input type="text" name="vcpu" value="{{ $server->vcpu }}" class="form-control">
                  @error('vcpu')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Tipo de Armazenamento:</label>
                  <select name="type_storage" id="type_storage" class="form-select">
                    @if ($server->type_storage == "SSD")
                      <option value="SSD" selected>SSD</option>
                      <option value="NVME">NVME</option>
                    @elseif ($server->type_storage == "NVME")
                      <option value="SSD">SSD</option>
                      <option value="NVME" selected>NVME</option>
                    @endif
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Quantia de Armazenamento:</label>
                  <input type="text" name="amount_storage" value="{{ $server->amount_storage }}" class="form-control">
                  @error('amount_storage')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Sistema Operacional:</label>
                  <select name="system" id="system" class="form-select">
                    <option value="Windows ou Linux">Windows ou Linux</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">DataCenter:</label>
                  <select name="locale" id="locale" class="form-select">
                    @if ($server->locale == "Canadá")
                      <option value="Canadá" selected>Canadá</option>
                      <option value="Brasil">Brasil</option>
                    @elseif ($server->locale == "Brasil")
                      <option value="Canadá">Canadá</option>
                      <option value="Brasil" selected>Brasil</option>
                    @endif
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Valor:</label>
                  <input type="text" name="price" value="{{ $server->price }}" class="form-control">
                  @error('price')<small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label">Estoque:</label>
                  <select name="stock" id="stock" class="form-select">
                    @if ($server->stock == "1")
                      <option value="1" selected>Disponível</option>
                      <option value="0">Indisponível</option>
                    @elseif ($server->stock == "0")
                      <option value="1">Disponível</option>
                      <option value="0" selected>Indisponível</option>
                    @endif
                  </select>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary float-end">
                    <i class="bi bi-star"></i> Atualizar
                  </button>
                </div>

              </form>
              {{-- Vertical Form --}}

        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}
  
@endsection