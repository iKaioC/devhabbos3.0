@extends('layouts.main')
@section('title', 'Termos de Serviço')
@section('content')

<section id="faq" class="faq">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Termos de Serviço</h2>
    </div>

    <ul class="faq-list">
      @foreach ($terms as $i => $term)
        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{$i+1}}">{{ $term->title }} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq{{$i+1}}" class="collapse" data-bs-parent=".faq-list">
            <p>
              {{ $term->description }}
              <p class="text-right">Atualizado em: {{ \Carbon\Carbon::parse($term->updated_at)->format('d/m/Y')}}</p>
            </p>
          </div>
        </li>
      @endforeach
    </ul>

  </div>
</section>

@endsection