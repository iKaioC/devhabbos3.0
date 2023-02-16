@extends('layouts.admin')
@section('title', 'Opcionais')
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
      <h1>Opcionais Habbo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Opcionais Habbo</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mt-1">Opcionais Habbo
              <a href="{{ route('create-optional') }}" class="btn btn-primary btn-sm float-end">
                <i class="bi bi-balloon"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Categoria</th>
                  <th>Tag1</th>
                  <th>Tag2</th>
                  <th>Preço</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($optionals as $optional)
                  <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Deletar Opcional</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('optional-destroy', $optional->id) }}" method="post">
                          @csrf
                          @method('DELETE')

                          <div class="modal-body">
                            Você tem certeza que deseja deletar este Opcional Habbo?
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
                    <td>{{ $optional->name }}</td>
                    <td>{{ $optional->category }}</td>
                    <td>{{ $optional->tag1 }}</td>
                    <td>{{ $optional->tag2 }}</td>

                    <td>
                      <span class="badge bg-success">
                        <i class="bi bi-currency-dollar"></i> {{ $optional->price }}
                      </span>
                    </td>

                    <td>
                      <a href="{{ route('edit-optional', $optional->id) }}" class="btn btn-success btn-sm">
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
            <div>{{ $optionals->links() }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection