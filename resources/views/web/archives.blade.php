@extends('layouts.main')

@section('content')

<section id="features" class="features">
  <div class="container">

    <div class="row">
      <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
        <ul class="nav nav-tabs flex-column">
          @foreach($archives as $archive)
            <li class="nav-item" data-aos="fade-up">
              <a class="nav-link @if($loop->first) active show @endif" data-bs-toggle="tab" href="#{{ $archive->slug }}">
                <h4>{{ $archive->name }}</h4>
                <p>{{ $archive->description }}</p>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
        <div class="tab-content">
          @foreach($archives as $archive)
            <div class="tab-pane @if($loop->first) active show @endif" id="{{ $archive->slug }}">
              <figure>
                <img src="{{ asset('web/archives/' . $archive->image) }}" alt="{{ $archive->name }}" class="img-fluid">
              </figure>
              <p>{{ $archive->description }}</p>
              <a href="{{ $archive->link }}">Link para download</a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</section>

@endsection