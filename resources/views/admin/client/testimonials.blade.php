@extends('layouts.admin')
@section('title', 'Depoimentos')
@section('content')

  <link rel="stylesheet" href="{{ asset('admin/css/profileclient.css') }}">
  
  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Depoimentos dos Clientes</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active">Depoimentos</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}

  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="mt-1">Depoimentos
            <a href="{{ route('admin-dashboard') }}" class="btn btn-danger float-end btn-sm">
              <i class="bi bi-arrow-left"></i> Voltar
            </a>
          </h5>
        </div>

        <div class="card-body mt-3">
          @foreach($testimonials as $testimonial)
            <div class="card-body">
              <div class="account-settings">
                <div class="user-profile">
                  <div class="user-avatar mt-5">
                    <img src="{{ asset('profile-images/'.$testimonial->user->image) }}" alt="{{ $testimonial->user->name }}">
                  </div>

                  <h5 class="user-name">{{ $testimonial->user->name }}</h5>
                  <h6 class="user-email">{{ $testimonial->user->rank }}</h6>
                  <h5 class="user-name mt-3">{{ $testimonial->testimony }}</h5>
                </div>
                <hr>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}
  
@endsection