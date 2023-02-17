@extends('layouts.main')

@section('content')

    <section id="pricing" class="pricing section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Servidores Habbo</h2>
          <p>Conheça nossas instalações de servidores Habbo já pré-montados e configurados prontos para utilizar e editar ao seu gosto. Toda a instalação é utilizado arquivos originais e é feito direto na máquina do cliente ou em sua VPS.</p>
        </div>

        <div class="row">

          @foreach ($habbos as $habbo)
          @if ($habbo->language == 'Inglês')
            <div class="col-lg-3 col-md-6">
              <div class="box" data-aos="zoom-in">
                <h3>BÁSICO</h3>
                <h4><sup>R$</sup>{{ $habbo->price }}</h4>
                <ul>
                  <li>{{ $habbo->emulator }}</li>
                  <li>{{ $habbo->cms }}</li>
                  <li>{{ $habbo->language }}</li>
                  <li class="na">Português</li>
                  <li class="na">Nitro HTML5</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Saiba mais</a>
                </div>
              </div>
            </div>
          @endif
          @endforeach

          @foreach ($habbos as $habbo)
          @if ($habbo->url == 'https://ptbr.devhabbo.tech')
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="200">
                <h3>Intermediário</h3>
                <h4><sup>R$</sup>{{ $habbo->price }}</h4>
                <ul>
                  <li>{{ $habbo->emulator }}</li>
                  <li>{{ $habbo->cms }}</li>
                  <li>{{ $habbo->language }}</li>
                  <li>Nitro HTML 5</li>
                  <li>Catálogo Traduzido</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Saiba mais</a>
                </div>
              </div>
            </div>
          @endif
          @endforeach

          @foreach ($habbos as $habbo)
          @if ($habbo->cms == 'Atom CMS')
          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span class="advanced">ADVANCED</span>
              <h3>Avançado</h3>
              <h4><sup>R$</sup>{{ $habbo->price }}</h4>
              <ul>
                <li>{{ $habbo->emulator }}</li>
                <li>{{ $habbo->cms }}</li>
                <li>{{ $habbo->language }}</li>
                <li>Nitro HTML 5</li>
                <li>Catálogo Traduzido</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Saiba mais</a>
              </div>
            </div>
          </div>
          @endif
          @endforeach

          @foreach ($habbos as $habbo)
          @if ($habbo->price == '0,00')
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
              <h3>Customizado</h3>
              <h4><sup>A combinar</sup></h4>
              <ul>
                <li>{{ $habbo->emulator }}</li>
                <li>CMS de sua escolha</li>
                <li>Inglês ou Português</li>
                <li>Nitro HTML 5</li>
                <li>Customizações</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Saiba mais</a>
              </div>
            </div>
          </div>
          @endif
          @endforeach

        </div>

      </div>
    </section>
@endsection