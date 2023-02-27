@extends('layouts.main')
@section('content')

  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach ($habbo->images as $image)
              <div class="swiper-slide">
                <a href="{{ asset('web/habbos/'.$image->path) }}" target="_blank">
                  <img src="{{ asset('web/habbos/'.$image->path) }}" alt="{{ $habbo->name }}">
                </a>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{ $habbo->name }}</h3>
            <ul>
              <li><strong>Emulador</strong>: {{ $habbo->emulator }}</li>
              <li><strong>CMS</strong>: {{ $habbo->cms }}</li>
              <li><strong>Linguagem</strong>: {{ $habbo->language }}</li>
              <li><strong>Demonstração</strong>: <a href="{{ $habbo->url }}">{{ $habbo->url }}</a></li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Descrição do servidor</h2>
            <p>
              {{ $habbo->description }}
            </p>
          </div>

          <a href="https://wa.me/13155122348?text=Eu%20quero%20contratar%20um%20Habbo%20da%20DevHabbos" target="_blank" class="btn btn-primary float-end">Adquirir</a>
        </div>

      </div>

    </div>
  </section>

@endsection