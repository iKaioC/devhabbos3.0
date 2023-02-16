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
      <h1>Arquivos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Arquivos</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5>Arquivos
              <a href="{{ route('create-archive') }}" class="btn btn-primary float-end">
                <i class="bi bi-database-add"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Slug</th>
                  <th>Link</th>
                  <th>Ações</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($archives as $archive)

                <div class="modal fade" id="deleteModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Deletar Arquivo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
            
                      <form action="{{ route('archive-destroy', $archive->id) }}" method="post">
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
                    <td>{{ $archive->name }}</td>
                    <td>{{ $archive->slug }}</td>
                    <td>{{ substr($archive->link, 0, 40) }}...</td>
                    <td>
                      <a href="{{ route('edit-archive', $archive->id) }}" class="btn btn-success">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div>{{ $archives->links() }}</div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
@endsection