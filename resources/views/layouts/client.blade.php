<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel - @yield('title')</title>

    {{-- Favicons --}}
    <link href="{{ asset('client/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('client/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('client/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
</head>
<body>

  @include('layouts.inc.client.header')

  @include('layouts.inc.client.sidebar')

  {{-- Page Content --}}
  <main id="main" class="main">

    @yield('content')

  </main>{{-- End Page Content --}}

  @include('layouts.inc.client.footer')

  {{-- Scripts --}}

  {{-- Vendor JS Files --}}
  <script src="{{ asset('client/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('client/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('client/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('client/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('client/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('client/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('client/vendor/php-email-form/validate.js') }}"></script>

  {{-- jQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  {{-- Template Main JS File --}}
  <script src="{{ asset('client/js/main.js') }}"></script>

  {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</body>
</html>
