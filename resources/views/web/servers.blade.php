@extends('layouts.main')
@section('title', 'VPS Canadá')
@section('content')

    <section id="pricing" class="pricing section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>VPS Canadá - Armazenamento SSD</h2>
          <p>Todos os servidores estão localizados no Canadá e possuem armazenamento rápido SSD. Você terá disponibilidade de escolher o sistema operacional, entre Windows ou Linux! Estes planos NÃO SÃO customizáveis.</p>
        </div>

        <div class="row">

          @foreach ($servers as $server)
            @if ($server->locale == 'Canadá' AND $server->type_storage == 'SSD')
            
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="300">
                
                  @if ($server->stock == '1')
                  <span class="stock">Disponível</span>
                  @else
                  <span class="nostock">Indisponível</span>
                  @endif
                
                <h3>{{ $server->name }}</h3>
                <h4><sup>R$</sup>{{ $server->price }}<span> / mês</span></h4>
                <ul>
                  <li>{{ $server->memory }}</li>
                  <li>{{ $server->vcpu }}</li>
                  <li>{{ $server->amount_storage }} {{ $server->type_storage }}</li>
                  <li>{{ $server->system }}</li>
                  <li>{{ $server->locale }}</li>
                </ul>
                <div class="btn-wrap">
                  <a href="https://wa.me/13155122348?text=Eu%20quero%20contratar%20uma%20VPS%20da%20DevHabbos" target="_blank" class="btn-buy">Adquirir</a>
                </div>
              </div>
            </div>

            @endif
          @endforeach

          

        </div>

      </div>
    </section>

    <section id="pricing" class="pricing bg-white">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>VPS Canadá - Armazenamento NVME</h2>
          <p>Todos os servidores estão localizados no Canadá e possuem armazenamento ULTRA rápido SSD NVME. Você terá disponibilidade de escolher o sistema operacional, entre Windows ou Linux! Planos customizáveis, basta entrar em contato.</p>
        </div>

        <div class="row">

          @foreach ($servers as $server)
            @if ($server->locale == 'Canadá' AND $server->type_storage == 'NVME')
            
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="300">
                
                  @if ($server->stock == '1')
                  <span class="stock">Disponível</span>
                  @else
                  <span class="nostock">Indisponível</span>
                  @endif
                
                <h3>{{ $server->name }}</h3>
                <h4><sup>R$</sup>{{ $server->price }}<span> / mês</span></h4>
                <ul>
                  <li>{{ $server->memory }}</li>
                  <li>{{ $server->vcpu }}</li>
                  <li>{{ $server->amount_storage }} {{ $server->type_storage }}</li>
                  <li>{{ $server->system }}</li>
                  <li>{{ $server->locale }}</li>
                </ul>
                <div class="btn-wrap">
                  <a href="https://wa.me/13155122348?text=Eu%20quero%20contratar%20uma%20VPS%20da%20DevHabbos" target="_blank" class="btn-buy">Adquirir</a>
                </div>
              </div>
            </div>

            @endif
          @endforeach

          

        </div>

      </div>
    </section>
@endsection