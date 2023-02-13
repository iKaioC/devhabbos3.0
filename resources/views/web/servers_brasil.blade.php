@extends('layouts.main')

@section('content')

    <section id="servers-brasil" class="pricing bg-white">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>VPS Brasil - Armazenamento NVME</h2>
          <p>Todos os servidores estão localizados no Brasil e possuem armazenamento ULTRA rápido SSD NVME. Você terá disponibilidade de escolher o sistema operacional, entre Windows ou Linux! Planos customizáveis, basta entrar em contato.</p>
        </div>

        <div class="row">

          @foreach ($servers as $server)
            @if ($server->locale == 'Brasil' AND $server->type_storage == 'NVME')
            
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
                  <a href="#" class="btn-buy">Adquirir</a>
                </div>
              </div>
            </div>

            @endif
          @endforeach

          

        </div>

      </div>
    </section>
@endsection