@extends('layouts.main')
@section('title', 'Início')
@section('content')

  <section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Adquira já seu servidor</h1>
            <h2>Não sabe como criar o servidor? Não quer ter o trabalho? Adquira já o seu servidor conosco! Clique em "Saiba Mais" para verificar mais detalhes.</h2>
            <a href="{{ route('web-habbo') }}" class="btn-get-started scrollto">Saiba Mais</a>
          </div>
        </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="{{ asset('web/img/habboimg1.gif') }}" class="img-fluid" alt="">
        </div>

      </div>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6" data-aos="zoom-in">
          <img src="{{ asset('web/img/habboimg2.png') }}" class="img-fluid" alt="">
        </div>

        <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
          <div class="content pt-4 pt-lg-0">
            <h3>Sobre nós</h3>
            <p class="fst-italic">
              A DevHabbos é uma comunidade focada no mundo virtual do jogo Habbo. Focamos em ajudar e auxiliar a comunidade Brasileira e Portuguêsa em seus servidores.
            </p>

            <ul>
              <li>
                <i class="bi bi-check-circle"></i> Oferecemos diversos serviços e servidores
              </li>
              <li>
                <i class="bi bi-check-circle"></i> Arquivos originais de seus desenvolvedores originais
              </li>
              <li>
                <i class="bi bi-check-circle"></i> Instalações direto em sua VPS ou máquina
              </li>
            </ul>

            <p>
              Além de ajudar toda a comunidade, oferecemos diversos serviços caso você não saiba como faze-lo ou não tenha interesse de ter o trabalho!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="testimonials" class="testimonials">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Clientes</h2>
        <p>Logo abaixo você poderá observar os depoimentos de alguns clientes que efetuaram seus serviços com a DevHabbos, e o que estão informando sobre a nossa empresa! Clicando abaixo do nome do cliente, você pode fazer uma visita ao servidor do mesmo.</p>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          @foreach ($testimonials->unique('id') as $testimonial)
            <div class="swiper-slide">
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ $testimonial->testimony }}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ asset('profile-images/'.$testimonial->user->image) }}" class="testimonial-img" alt="{{ $testimonial->user->name }}">
                    <a href="{{ $testimonial->user->link }}">
                        <h3>{{ $testimonial->user->name }}</h3>
                        <h4>{{ $testimonial->user->rank }}</h4>
                    </a>
                </div>
            </div><!-- End testimonial item -->
          @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

@endsection