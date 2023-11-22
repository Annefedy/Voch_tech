<!DOCTYPE html>
<html lang="pt_Br">

@includeIf('Painel.Layout.head')
<!-- jQuery -->
@includeIf('Painel.Layout.scripts')

<link rel="stylesheet" href="{{ asset('/css/login.css') }}">


<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            {{-- <img class="animation__shake" src="{{ asset('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60"> --}}
            <img class="animation__shake" src="{{ asset('img/logo-roxo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm col-sm-vmb">
                    <div class="div-logo">
                        <img class="rg-logo" src="{{ asset('/img/Logo.png') }}" alt="">
                    </div>

                </div>

                <div class="col-sm col-sm-vmb">
                    <main class="login-form div-login">
                        <div class="cotainer">
                            <div class="row justify-content-center">
                                <div class="col-md">
                                    <div class="card">

                                        <h3 class="card-header text-center title-login">Login</h3>

                                        <div class="card-body">

                                            <div class="row justify-content-center">
                                                <img class="icon-social" src="{{ asset('/img/Button-linkdin.png') }}"
                                                    alt="">
                                                <img class="icon-social" src="{{ asset('/img/Button-facebook.png') }}"
                                                    alt="">
                                                <a href="{{ route('login.externo', ['provider' => 'google']) }}">
                                                    <img class="icon-social" src="{{ asset('/img/Button-google.png') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div>
                                                @if ($errors->any())
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                {{-- <a href="{{ route('login.externo', ['provider' => 'google']) }}">
                                                    <h2>Logar com o Google</h2>
                                                </a> --}}

                                            </div>

                                            <div class="txt-or">ou</div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf


                                                <div class="input-group mb-3">

                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">email</i>
                                                            {{-- <span style="font-size:20px" class="far fa-envelope"></span> --}}
                                                        </div>
                                                    </div>
                                                    <input type="email" name="email"
                                                        class="form-control form-custom @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" placeholder="E-mail" autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="input-group mb-3">

                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            {{-- <i class="material-icons"
                                                                style="font-size:23px">lock_outline</i> --}}
                                                                <i class="material-icons">lock</i>
                                                        </div>
                                                    </div>

                                                    <input type="password" name="password"
                                                        class="form-control form-custom @error('password') is-invalid @enderror"
                                                        placeholder="Senha">

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>


                                                <div class="row l4">
                                                    <div class="col-7">
                                                        <div class="icheck-primary tx-lbm" title="Lembre de mim">

                                                            <label class="vaga-check tx-lbm">Lembre de mim
                                                                <input type="checkbox" name="loginRemember" id="loginRemember" {{ old('loginRemember') ? 'checked' : '' }}>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-5">

                                                        <p class="my-0">
                                                            <a class="tx-yelow" href="#">
                                                                Esqueceu a Senha?
                                                            </a>
                                                        </p>

                                                    </div>
                                                </div>

                                                <div class="row l5">
                                                    <div class="col-12" align="center">
                                                        <button type=submit
                                                            class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                                            Login
                                                        </button>
                                                    </div>
                                                </div>


                                                <div class="row l6">
                                                    <div class="col-12">

                                                        <p class="my-0" align="center">
                                                            Novo candidato a emprego?&nbsp;&nbsp;
                                                            <a class="tx-yelow" href="#">
                                                                Registre-se
                                                            </a>
                                                        </p>

                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

    </div>
    <!-- ./wrapper -->
</body>

</html>
