@extends('layouts.main')

@section('content')

<section id="faq" class="faq">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Perguntas Frequentes</h2>
    </div>

    <ul class="faq-list">
      @foreach ($faqs as $i => $faq)
        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{$i+1}}">{{ $faq->title }} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq{{$i+1}}" class="collapse" data-bs-parent=".faq-list">
            <p>
              {{ $faq->description }}
            </p>
          </div>
        </li>
      @endforeach
    </ul>

  </div>
</section>

@endsection