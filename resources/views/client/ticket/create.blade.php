@extends('layouts.client')

@section('content')

  <div class="pagetitle">
    <h1>Perfil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('client-dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tickets-index') }}">Tickets</a></li>
        <li class="breadcrumb-item active">Criar novo ticket</li>
      </ol>
    </nav>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Abrir um Ticket</h5>

      <form class="row g-3" method="post" action="{{ route('tickets-store') }}">
        @csrf
        <div class="col-md-12">
          <label for="title" class="form-label">Título do Problema:</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-md-4">
          <label for="category" class="form-label">Categoria:</label>
          <select id="category" class="form-select" name="category">
            <option selected>VPS</option>
            <option>Habbo</option>
            <option>Opcionais</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="priority" class="form-label">Prioridade:</label>
          <select id="priority" class="form-select" name="priority">
            <option selected>Baixa</option>
            <option>Média</option>
            <option>Alta</option>
          </select>
        </div>
        <div class="col-md-12">
          <label for="description" class="form-label">Descreva o Problema:</label>
          <textarea name="description" id="description" class="form-control" cols="6" rows="8"></textarea>
        </div>

        <p>Autor: <strong>{{ Auth::user()->name }}</strong></p>

        <button type="submit" class="btn btn-primary">Abrir Ticket</button>
      </form>

    </div>
  </div>

@endsection
