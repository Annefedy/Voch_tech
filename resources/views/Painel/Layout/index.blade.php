<!DOCTYPE html>
<html lang="pt_Br">
@includeIf('Painel.Layout.head')
{{-- jQuery --}}
@includeIf('Painel.Layout.scripts')

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
      {{-- <img class="animation__shake" src="{{ asset('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') }}"
      alt="AdminLTELogo"
      height="60" width="60"> --}}
      <img class="animation__shake" src="{{ asset('img/logo-roxo.png') }}" alt="AdminLTELogo" height="60" width="60">

    </div>

    @includeIf('Painel.Layout.header')
    @includeIf('Painel.Layout.sidebar')

    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">

      {{-- Content Header (Page header) --}}
      {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0" id="pg-title"></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> --}}

      {{-- Content --}}
      @yield('content')


    </div>


    {{-- Content Footer --}}
    @includeIf('Painel.Layout.footer')

    {{-- Control Sidebar --}}
    @includeIf('Painel.Layout.control-sidebar')

  </div>
  {{-- ./wrapper --}}

</body>

</html>