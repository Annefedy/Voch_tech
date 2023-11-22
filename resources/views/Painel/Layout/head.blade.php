<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="theme-color" content="#E72C88">
  <meta name="apple-mobile-web-app-status-bar-style" content="#E72C88">
  <meta name="msapplication-navbutton-color" content="#E72C88">

  <title>VochTech</title>

  {{-- <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}"> --}}
  <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

  {{-- Google Font: Source Sans Pro --}}
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  {{-- Font Awesome --}}
  {{-- <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}"> --}}
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  {{-- Ionicons --}}
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}

  {{-- Tempusdominus Bootstrap 4 --}}
  {{-- <link rel="stylesheet"
        href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  --}}
  {{-- iCheck --}}
  {{-- <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  --}}
  {{-- JQVMap --}}
  {{-- <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css') }}"> --}}

  {{-- Theme style --}}
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">

  {{-- overlayScrollbars Menu Lateral Esquerdo --}}
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

  {{-- Daterange picker --}}
  {{-- <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}"> --}}
  {{-- summernote --}}
  {{-- <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css') }}"> --}}




  {{-- @php
        $route = Request::path();
        $route = explode('/', $route);
    @endphp

    @if (empty($route[0]) || $route[0] == 'page' || $route[0] == 'login' || $route[0] == 'painel')
        <link rel="stylesheet" href="{{ asset('css/page-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/painel-recrutamento.css') }}">
  @else
  <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin-custom-' . $route[0] . '.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/painel-' . $route[0] . '.css') }}">
  @endif --}}

  <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin-custom-admissao.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/painel-admissao.css') }}">

</head>