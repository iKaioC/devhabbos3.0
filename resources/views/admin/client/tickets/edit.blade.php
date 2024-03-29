@extends('layouts.client')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('client/css/tickets.css') }}">

@section('content')

  <div class="pagetitle">
    <h1>Perfil</h1>

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('client-tickets-admin') }}">Tickets</a></li>
        <li class="breadcrumb-item active">Responder um ticket</li>
      </ol>
    </nav>
  </div>

  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <div class="card col-lg-12">
    <div class="card-header text-secondary">
      <strong>{{ $ticket->title }}</strong>
      <form method="POST" action="{{ route('tickets-update-admin', $ticket->id) }}" class="float-end">
        @csrf
        @method('PATCH')
        <div class="dropdown">
          <button class="btn btn-{{ $ticket->status === 'Aberto' ? 'success' : ($ticket->status === 'Pendente' ? 'warning' : 'secondary') }}" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $ticket->status }}
          </button>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li>
              <button type="submit" name="status" value="Aberto" class="dropdown-item @if ($ticket->status == 'Aberto') active @endif">Aberto</button>
            </li>
            <li>
              <button type="submit" name="status" value="Pendente" class="dropdown-item @if ($ticket->status == 'Pendente') active @endif">Pendente</button>
            </li>
            <li>
              <button type="submit" name="status" value="Fechado" class="dropdown-item @if ($ticket->status == 'Fechado') active @endif">Fechado</button>
            </li>
          </ul>
        </div>
      </form>
    </div>

    <div class="container padding-bottom-3x mb-2">
      <div class="row">
        <div class="col-lg-4">
          <aside class="user-info-wrapper">
            <div class="user-cover" style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);">
              <div class="info-label" data-toggle="tooltip" title="" data-original-title="You currently have 290 Reward Points to spend">
                <i class="icon-medal"></i>{{ $ticket->user->rank }}
              </div>
            </div>

            <div class="user-info">
              <div class="user-avatar">
                <a class="edit-avatar" href="#"></a>
                <img src="{{ asset('profile-images/'.$ticket->user->image) }}" alt="User">
              </div>

              <div class="user-data">
                <h4>{{ $ticket->user->name }}</h4>
                <span>Entrou em {{ $ticket->user->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y') }}</span>
              </div>
            </div>
          </aside>

          <nav class="list-group">
            <a class="list-group-item with-badge active" href="{{ route('tickets-index') }}">
              <i class="fa fa-th"></i>
              Tickets
            </a>

            <a class="list-group-item" href="{{ route('user-edit') }}">
              <i class="fa fa-user"></i>
              Perfil
            </a>

            <a class="list-group-item" href="{{ route('client-servers') }}">
              <i class="fa fa-map"></i>
              VPS
            </a>

            <a class="list-group-item with-badge" href="{{ route('client-habbos') }}">
              <i class="fa fa-heart"></i>
              Habbos
            </a>

            <a class="list-group-item with-badge" href="{{ route('client-optionals') }}">
              <i class="fa fa-tag"></i>
              Opcionais
            </a>
          </nav>
        </div>

        <div class="col-lg-8">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="table-responsive margin-bottom-2x">
            <table class="table margin-bottom-none">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Data</th>
                  <th>Tipo</th>
                  <th>Prioridade</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><span class="text-dark">{{ $ticket->title }}</span></td>
                  <td>{{ $ticket->created_at->setTimezone('America/Sao_Paulo')->format('d/m/Y') }}</td>
                  <td>{{ $ticket->category }}</td>

                  @if ($ticket->priority == 'Alta')
                    <td><span class="text-danger">Alta</span></td>
                  @elseif ($ticket->priority == 'Média')
                    <td><span class="text-warning">Média</span></td>
                  @elseif ($ticket->priority == 'Baixa')
                    <td><span class="text-success">Baixa</span></td>
                  @endif

                  @if ($ticket->status == 'Aberto')
                    <td><span class="text-success">Aberto</span></td>
                  @elseif ($ticket->status == 'Pendente')
                    <td><span class="text-warning">Pendente</span></td>
                  @elseif ($ticket->status == 'Fechado')
                    <td><span class="text-secondary">Fechado</span></td>
                  @endif
                </tr>
              </tbody>
            </table>

            <div class="comment">
              <div class="comment-author-ava">
                <img src="{{ asset('profile-images/'.$ticket->user->image) }}" alt="Avatar">
              </div>

              <div class="comment-body">
                <p class="comment-text">
                  {{ $ticket->description }}
                </p>

                <div class="comment-footer">
                  <span class="comment-meta">
                    {{ $ticket->user->name }}
                  </span>
                </div>
              </div>
            </div>

          </div>
          
          {{-- Messages --}}
          @foreach ($ticket->comments as $comment)
            <div class="comment">
              <div class="comment-author-ava">
                <img src="{{ asset('profile-images/'.$comment->user->image) }}" alt="Avatar">
              </div>

              <div class="comment-body">
                <p class="comment-text">
                  {{ $comment->comment }}
                </p>

                <div class="comment-footer">
                  <span class="comment-meta">
                    {{ $comment->user->name }}
                  </span>
                </div>
              </div>
            </div>
          @endforeach
          
          @if ($ticket->status == 'Aberto' OR $ticket->status == 'Pendente' )
            {{-- Reply Form --}}
            <h5 class="mb-30 padding-top-1x">Responder o Cliente</h5>
            <form action="{{ route('ticket-comments-store', $ticket) }}" method="post">
              @csrf
              <div class="form-group">
                  <textarea class="form-control form-control-rounded" id="review_text" name="comment" rows="8" placeholder="Descreva sua conclusão do problema..." required=""></textarea>
              </div>
          
              <div class="text-right float-end mt-3">
                  <button class="btn btn-outline-primary" type="submit">Enviar</button>
              </div>
            </form>
          @elseif ($ticket->status == 'Fechado')
            <p>
              <span class="badge bg-secondary">
                Este ticket já foi concluído e fechado, caso tenha mais dúvidas, abra outro ticket!
              </span>
            </p>
          @endif
        </div>
      </div>
    </div>
  </div>

@endsection
