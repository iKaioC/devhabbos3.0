@extends('layouts.main')

@section('content')

  <section id="services" class="services bg-white">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Opcionais Habbo</h2>
        <p>Uma gama de opções para turbinar o seu servidor Habbo!</p>
      </div>

      <div class="row">
        @foreach ($optionals as $optional)
          @if ($optional->category == 'Habbo')
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box {{ $optional->color }}">
              <p style="font-size: 12px; color: #a7a7a7;">Clique no ícone para saber mais!</p>
              <a href=""><div class="icon"><i class="{{ $optional->icon }}"></i></div>
              <h4 class="title">{{ $optional->name }}</a></h4>
              <p class="description mb-5">{{ $optional->description }}</p>
              <h3>R${{ $optional->price }}</h3>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

@endsection