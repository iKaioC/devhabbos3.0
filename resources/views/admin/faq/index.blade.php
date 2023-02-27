@extends('layouts.admin')
@section('title', 'Perguntas Frequentes')
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
      <h1>Perguntas Frequentes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Perguntas Frequentes</li>
        </ol>
      </nav>
    </div>
    {{-- End Page Title --}}

    {{-- Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mt-1">Perguntas Frequentes
              <a href="{{ route('create-faq') }}" class="btn btn-primary btn-sm float-end">
                <i class="bi bi-question-square"></i> Adicionar
              </a>
            </h5>
          </div>

          <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($faqs as $faq)
                  <div class="modal fade" id="deleteModal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Deletar FAQ</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('faq-destroy', $faq->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <div class="modal-body">
                            Você tem certeza que deseja deletar esta FAQ?
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
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->title }}</td>
                    <td>
                      {{ Str::substr($faq->description, 0, 50); }}...
                    </td>
                    <td>
                      <a href="{{ route('edit-faq', $faq->id) }}" class="btn btn-success btn-sm">
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
            <div>{{ $faqs->links() }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection