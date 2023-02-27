@extends('layouts.main')
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

                <div class="swiper-slide">
                  <img src="https://www.howtogeek.com/wp-content/uploads/2014/07/new-IIS-hero.png?width=1198&trim=1,1&bg-color=000&pad=1,1" width="800" alt="{{ $optional->name }}">
                </div>

                <div class="swiper-slide">
                  <img src="https://www.oreilly.com/api/v2/epubs/9780133116007/files/graphics/12fig01.jpg" height="500" alt="{{ $optional->name }}">
                </div>

                <div class="swiper-slide">
                  <img src="https://rdr-it.com/wp-content/uploads/images/03-clic-active-desactive-extention.jpg" height="500" alt="{{ $optional->name }}">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

@endsection