@extends('layouts.client')
@section('content')

  @if(session('message'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i> {{ session('message') }}
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Page Title --}}
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
      </ol>
    </nav>
  </div>
  {{-- End Page Title --}}
  
  {{-- Content --}}
  <div class="col-lg-12">
    <div class="row justify-content-md-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            Seu Depoimento
          </div>

          @foreach ($testimonials as $testimonial)
            <div class="card-body">
              <h5 class="card-title">Depoimento: {{ $testimonial->id }}</h5>

              <div class="d-flex justify-content-center">
                <img src="{{ asset('profile-images/'.Auth::user()->image) }}" width="100px" alt="Kaio Conde" class="rounded-circle">
              </div>
              
              <p class="d-flex justify-content-center mt-3">{{ $testimonial->testimony }}</p>

              <hr>

            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- End Content --}}
@endsection