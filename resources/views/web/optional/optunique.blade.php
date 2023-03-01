@extends('layouts.main')
@section('title', $optional->name)
@section('content')

  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4">
          <div class="portfolio-info text-center">
            <h3>{{ $optional->name }}</h3>
            <ul>
              <li><strong>Categoria</strong>: {{ $optional->category }}</li>
              <li><p><strong>Informações</strong></p>
                <p class="m-0">- {{ $optional->tag1 }}</p>
                <p class="m-0">- {{ $optional->tag2 }}</p>
                <p class="m-0">- {{ $optional->tag3 }}</p>
              </li>
              <li>
                <h3 class="text-secondary mt-4">R$ {{ $optional->price }}</h3>
              </li>
              <li>
                <a href="https://wa.me/13155122348?text=Eu%20quero%20contratar%20um%20Opcional%20Habbo%20da%20DevHabbos" target="_blank" class="btn btn-primary">Adquirir</a>
              </li>

              @if (!empty($optional->repository))
                <li>
                  <h6 class="text-secondary mt-4">Clique <a href="{{ $optional->repository }}" target="_blank">aqui</a> para acessar o repositório!</h6>
                </li>
              @else

              @endif
            </ul>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="portfolio-info text-center">
            <h3>Descrição</h3>
            <ul>
              <li><h6>{{ $optional->description }}</h6></li>
            </ul>
          </div>

          <div class="portfolio-info text-center">
            <h3>Imagem</h3>
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                @foreach ($optional->images as $image)
                <div class="swiper-slide">
                  <a href="{{ asset('web/optionals/'.$image->path) }}" target="_blank">
                    <img src="{{ asset('web/optionals/'.$image->path) }}" alt="{{ $optional->name }}">
                  </a>
                </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection