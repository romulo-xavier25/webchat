<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Busca Síndico @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.timepicker.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/fb25b97a0d.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="{{ asset('js/scripts-horario-funcionamento.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/query.timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media_query.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon" />
    
    
</head>
<body>
    <div id="app">

        <div class="col-md-12 topoFull">

            <div class="container">

                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="col-md-2 col-xs-12 logo">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" class="img-fluid" />
                        </a>
                    </div>
    
                    <div class="col-xs-12">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ajusteResponsivoIcone">
                                <img src="{{ asset('images/maleta-de-escritorio.svg') }}" class="iconeMaleta" alt="">
                            </li>

                            <li class="nav-item marginRight ajusteResponsivoTXT">
                                <a class="nav-link" href="{{ route('planos') }}">{{ __('Planos Profissionais') }}</a>
                            </li>

                            @php
                                if(Auth::check())
                                    $arquivo = 'storage/upload/' . Auth::user()->foto;
                            @endphp

                            @if(Auth::check())
                                @if(Auth::user()->tipo_de_usuario == "Síndico")
                                    <li class="nav-item">
                                        @if(file_exists($arquivo))
                                            <img src="{{ asset('storage/upload/' . Auth::user()->foto) }}" class="imgMenuTopo" alt="">
                                        @else
                                             <i class="fa fa-user-circle-o iconeL" aria-hidden="true"></i>
                                        @endif
                                    </li>

                                    <li class="nav-item">                                   
                                        <li class="nav-item dropdown marginRight">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->nome }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('perfil') }}">
                                                    {{ __('Perfil') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('meus-anuncios') }}">
                                                    {{ __('Meus Anuncios') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('chat') }}">
                                                    {{ __('Chat') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('pagamentos') }}">
                                                    {{ __('Pagamentos') }}
                                                </a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Sair') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    </li>
                                @endif

                                @if(Auth::user()->tipo_de_usuario == "Fornecedor")
                                    <li class="nav-item">
                                        @if(file_exists($arquivo))
                                            <img src="{{ asset($arquivo) }}" class="imgMenuTopo" alt="">
                                        @else
                                             <i class="fa fa-user-circle-o iconeL" aria-hidden="true"></i>
                                        @endif
                                    </li>

                                    <li class="nav-item">                                   
                                        <li class="nav-item dropdown marginRight">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->nome }}
                                            </a>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('perfil') }}">
                                                    {{ __('Perfil') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('meus-anuncios') }}">
                                                    {{ __('Meus Anuncios') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('chat') }}">
                                                    {{ __('Chat') }}
                                                </a>

                                                <a class="dropdown-item" href="{{ route('pagamentos') }}">
                                                    {{ __('Pagamentos') }}
                                                </a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Sair') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    </li>
                                @endif
                                    
                            @else
                                <li class="nav-item ajusteResponsivoIcone">
                                    <i class="fa fa-user-circle-o icone" aria-hidden="true"></i>
                                </li>

                                <li class="nav-item marginRight ajusteResponsivoTXT" >
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Área do Síndico') }}</a>
                                </li>

                                <li class="nav-item ajusteResponsivoIcone">
                                    <i class="fa fa-user-circle-o icone" aria-hidden="true"></i>
                                </li>

                                <li class="nav-item marginRight ajusteResponsivoTXT" >
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Área do Fornecedor') }}</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                @if(Auth::check())
                                    <a class="nav-link btn btnCadastrar" href="{{ route('cadastrar-anuncio') }}">{{ __('Anuncie') }}</a>
                                @else
                                    <a class="nav-link btn btnCadastrar" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                @endif
                            </li>
                        </ul>
                    </div><!-- fim da Div navbarSupportedContent -->
                </nav>
            </div><!-- fim da Div Container -->
        </div><!-- fim da Div topoFull -->

        <div class="col-md-12 descricaoFull">
            <div class="container">
                <p class="text-center h5">Buscasíndico o guia de serviços e produtos para o mercado condominial.</p>
            </div>
        </div>

        <div class="col-md-12 pesquisaFull">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <form action="{{ route('pesquisa.resultados') }}" method="post">
                        @csrf
                            <div class="col-md-4 marginRightForm form-check-inline offset-1">
                                    <input id="filtrarEmpresa" type="text" class="form-control formBuscaFornecedor @error('filtrarEmpresa') is-invalid @enderror" name="filtrarEmpresa" value="{{ old('filtrarEmpresa') }}" placeholder="Síndico, Administrador, etc..." required autocomplete="filtrarEmpresa" autofocus>
        
                                    @error('filtrarEmpresa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
        
                            <div class="col-md-4 marginRightForm form-check-inline">
                                    <input id="filtroLocalidade" type="text" class="form-control formBuscaFornecedor @error('filtroLocalidade') is-invalid @enderror" name="filtroLocalidade" value="{{ old('filtroLocalidade') }}" placeholder="Bairro, Cidade ou Estado" required autocomplete="filtroLocalidade" autofocus>
        
                                    @error('filtroLocalidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
        
                            <div class="col-md-2 marginRightForm form-check-inline">
                                <button class="btn btnPesquisar">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    BUSCAR
                                </button>
                            </div>
                        </form>
                    </div>

                </div><!-- fim da Div row -->
            </div><!-- fim da Div Container -->
        </div><!-- fim da Div pesquisaFull -->
        
        @php
            $url = $_SERVER['HTTP_HOST'];
            $urlCompleta = $url . $_SERVER['REQUEST_URI'];
            $pageCSS = "paginaIndex";
            if ($urlCompleta != "localhost:8000/"){
                $pageCSS = "paginaInterna";
            }
        @endphp

        <main class="main {{ $pageCSS }}">
            @yield('content')
        </main>
    </div>

        
    <footer class="col-md-12 rodapeFull">
        <div class="container">
            <div class="row">
                <div class="col-md-4 buscasindicoRodape">
                    <h1 class="h6">
                        Buscasíndico
                    </h1>

                    <ul class="menuRodape">
                        @if(Auth::check())
                            <li><a href="">Área do Síndico</a></li>
                            <li><a href="">Área do Fornecedor</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Área do Síndico</a></li>
                            <li><a href="{{ route('login') }}">Área do Fornecedor</a></li>
                        @endif
                        <li><a href="">Politica de privacidade</a></li>
                    </ul>
                </div>

                <div class="col-md-4 minhaContaRodape">
                    <h1 class="h6">
                        Minha Conta
                    </h1>

                    <ul class="menuRodape">
                        <li><a href="">Ajuda</a></li>
                        <li><a href="{{ route('planos') }}">Planos Profissionais</a></li>
                        <li><a href="">Termos de uso</a></li>
                        <li><a href="{{ route('contato') }}">Contato</a></li>
                    </ul>
                </div>

                <div class="col-md-4 redesSociaisRodape">
                    <h1 class="h6">
                        Redes Sociais
                    </h1>

                    <ul class="menuRodapeRedesSociais">
                        <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div><!-- fim da Div row -->

            <div class="row">
                <div class="container">
                    <p class="text-center copyright">
                        Buscasíndico. Todos os direitos reservados <br />
                        Buscasíndico Internet S/A - CNPJ: 09.083.175/0001-84
                        / Av. Ataulfo de Paiva 1079, sala 707 - Fortaleza - 
                        CE - 22440-034
                    </p>
                </div>
            </div><!-- fim da Div row -->
        </div>
    </footer>

</body>
</html>
