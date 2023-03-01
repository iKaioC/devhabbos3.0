<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevHabbos: @yield('title')</title>

    {{-- Favicons --}}
    <link href="{{ asset('web/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('web/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('web/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('web/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
</head>
<body>

  @include('layouts.inc.web.header')

  {{-- Page Content --}}
  <main id="main">
    
    <section class="inner-page">
        @yield('content')
    </section>

  </main>{{-- End Page Content --}}

  @include('layouts.inc.web.footer')

  {{-- Vendor JS Files --}}
  <script src="{{ asset('web/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('web/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('web/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('web/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('web/vendor/php-email-form/validate.js') }}"></script>

  {{-- Template Main JS File --}}
  <script src="{{ asset('web/js/main.js') }}"></script>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
