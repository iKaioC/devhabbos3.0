@extends('layouts.main')
@section('title', 'Sistemas Habbo')
@section('content')

<section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Sistemas</h2>
      <p>Desenvolvemos diversos e quaisquer sistemas que sejam requeridos ou desejados pelos proprietários dos servidores Habbo.
        <br>Solicite já seu orçamento conosco de seu sistema!</p>
      <br>
      <p>Confira abaixo alguns sistemas já feitos por nós.</p>
    </div>

    <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src={{ asset('web/systems/ShopAutomatic.png') }} class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Loja Automática</h4>
            <p>Venda de VIP e Créditos automáticos</p>
          </div>
          <div class="portfolio-links">
            <a href={{ asset('web/systems/ShopAutomatic.png') }} data-gallery="portfolioGallery" class="portfolio-lightbox" title="Loja construída na CMS Atom e integrado o MercadoPago para as vendas dentro do website."><i class="bx bx-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-wrap">
          <img src={{ 'web/systems/ShopAutomatic2.png' }} class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Loja Automática de Recarga</h4>
            <p>Loja de recarga de saldo</p>
          </div>
          <div class="portfolio-links">
            <a href={{ 'web/systems/ShopAutomatic2.png' }} data-gallery="portfolioGallery" class="portfolio-lightbox" title="Loja construída na CMS Atom e integrado o MercadoPàgo, loja feita para recargas de saldo."><i class="bx bx-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src={{ 'web/systems/FeedAutomatic.png' }} class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Feed Social Habbo</h4>
            <p>Um Feed Social feito para a equipe do seu servidor!</p>
          </div>
          <div class="portfolio-links">
            <a href={{ 'web/systems/FeedAutomatic.png' }} data-gallery="portfolioGallery" class="portfolio-lightbox" title="Feed Construído para a postagem de informações importantes para os usuários através dos membros da equipe!"><i class="bx bx-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src={{ 'web/systems/BadgeAutomatic.png' }} class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Hospedagem de Emblemas Automática</h4>
            <p>Hospede seus emblemas direto do seu painel!</p>
          </div>
          <div class="portfolio-links">
            <a href={{ 'web/systems/BadgeAutomatic.png' }} data-gallery="portfolioGallery" class="portfolio-lightbox" title="Sistema criado para permitir que os membros da equipe hospedem emblemas através do painel de controle!"><i class="bx bx-plus"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

@endsection