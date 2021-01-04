@extends('layouts.interna')

@section('title', '- Perfil')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2 sidebarMenu">
                @include('layouts.sidebar_menu_perfil')
            </div><!-- fim da Div sidebarMenu -->

            <div class="col-md-7 paginaPerfil ">

                <div class="col-md-12 tituloPaginas">
                    <h1 class="h3">Meu cadastro</h1>
                    <span>Configure o seu cadastro.</span>
                </div>

                <div class="col-md-12 blocoPerfil conteudoPadrao">
                    <div class="col-md-12 borderBottom">
                        <div class="row">
                            <div class="col-md-3 col-xs-12 fotoPerfil">

                                @php
                                    $arquivo = "storage/upload/" . $user->foto;
                                    
                                @endphp

                                @if(file_exists($arquivo))
                                    <img src="{{ asset('storage/upload/' . $user->foto) }}" class="img-fluid" alt="">
                                @else
                                    <i aria-hidden="true" class="fa fa-user-circle-o icone"></i>
                                @endif
                            </div><!-- fim da Div fotoPerfil -->
    
                            <div class="col-md-9 col-xs-12 infoPerfil">
                                <div class="row">
                                    <div class="col-md-12 btnAletar">
                                        @include('includes.alerts')
                                        <button class="btn alterar">
                                            Alterar
                                        </button>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span>Nome:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <strong>{{ $user->nome }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span>identificação:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>{{ $user->tipo_de_usuario }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fim da Div row -->
    
                                <div class="row">
                                    <div class="col-md-5 blocoCPF">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <span>Telefone:</span>
                                            </div>
                                            <div class="col-md-8">
                                                <strong>{{ $user->telefone }}</strong>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-7 blocoCPF">
                                        <div class="row">
                                            <div class="col-md-3 blocoEmailPadding">
                                                <span>E-mail:</span>
                                            </div>
                                            <div class="col-md-9">
                                                <strong>{{ $user->email }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fim da Div row -->
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-12 bloco1">
                        <div class="col-md-12 col-xs-12 infoPerfil">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <span>Gênero:</span>
                                        </div>
                                        <div class="col-md-7">
                                            <strong>{{ $user->genero }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span>Endereço:</span>
                                        </div>
                                        <div class="col-md-9">
                                            <strong>{{ $user->endereco }}, {{ $user->numero }} <br />
                                                    {{ $user->bairro }}, {{ $user->cidade }} - {{ $user->estado }}, 
                                                    {{ $user->cep }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- fim da Div row -->
                        </div><!-- fim da Div infoPerfil -->
                    </div><!-- fim da Div blocoPerfil -->
    
                    <div class="col-md-12 blocoTipoDeConta">
                        <div class="col-md-12 col-xs-12 infoPerfil">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Tipo de conta:</span>
                                    <strong>

                                        @if (empty($anuncios->all()))
                                            Gratuito
                                        @else

                                            @if (count($anuncios) < 2)
                                                @if ($anuncios[0]->tipo_de_planos_id == 1)
                                                    Gratuito
                                                @endif

                                                @if ($anuncios[0]->tipo_de_planos_id == 2)
                                                    Light
                                                @endif

                                                @if ($anuncios[0]->tipo_de_planos_id == 3)
                                                    Profissional
                                                @endif

                                                @if ($anuncios[0]->tipo_de_planos_id == 4)
                                                    Premium
                                                @endif
                                        
                                            @else
                                                @php
                                                    $tipoDePlanosId = null;
                                                    for ($i=0; $i < count($anuncios); $i++) { 
                                                        $tipoDePlanosId[] = $anuncios[$i]->tipo_de_planos_id;
                                                    }
                                                    $tipoDePlanosIdUser = max($tipoDePlanosId);

                                                    if ($tipoDePlanosIdUser == 1)
                                                        echo "Gratuito";
                                                
                                                    if ($tipoDePlanosIdUser == 2)
                                                        echo "Light";

                                                    if ($tipoDePlanosIdUser == 3)
                                                        echo "Profissional";

                                                    if ($tipoDePlanosIdUser == 4)
                                                        echo "Premium";
                                                @endphp
                                            @endif

                                        @endif

                                    </strong>
                                </div>
                            </div><!-- fim da Div row -->
                        </div><!-- fim da Div infoPerfil -->
                    </div><!-- fim da Div blocoPerfil -->
                </div><!-- fim da Div blocoPerfil -->

                <div class="col-md-12 formEditarPerfil conteudoPadrao">

                    <form name="cadastrarUsuario" method="POST" action="{{ route('perfil') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4 fotoPerfilFIle">
                                        <div class="personal-image">
                                            <label class="label">
                                                <input type="file" name="foto" />
                                                @if(file_exists($arquivo))
                                                    <figure class="personal-figure">
                                                        <img src="{{ asset('storage/upload/' . $user->foto) }}" class="personal-avatar" alt="avatar">
                                                    <figcaption class="personal-figcaption">
                                                        <img src="{{ asset('images/camera-white.png') }}">
                                                    </figcaption>
                                                    </figure>
                                                @else
                                                    <figure class="personal-figure">
                                                        <i aria-hidden="true" class="fa fa-user-circle-o icone"></i>
                                                    <figcaption class="personal-figcaption">
                                                        <img src="{{ asset('images/camera-white.png') }}">
                                                    </figcaption>
                                                    </figure>
                                                @endif
                                                
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <label for="nome">Nome</label>
                                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $user->nome }}" required autocomplete="nome" autofocus>
                
                                            @error('nome')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
    
                                        <div class="col-md-12">
                                            <label for="telefone" class="marginTopLabel">Telefone</label>
                                            <input id="telefone" type="tel" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $user->telefone }}" required autocomplete="telefone">
                
                                            @error('telefone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="endereco">Endereço</label>
                                <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ $user->endereco }}" required autocomplete="endereco" autofocus>
    
                                @error('endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="numero">N&deg</label>
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $user->numero }}" required autocomplete="numero" autofocus>
    
                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="bairro">Bairro</label>
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ $user->bairro }}" required autocomplete="bairro" autofocus>
    
                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="complemento">Complemento</label>
                                <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ $user->complemento }}" required autocomplete="complemento" autofocus>
    
                                @error('complemento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="cidade">Cidade</label>
                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ $user->cidade }}" required autocomplete="cidade" autofocus>
    
                                @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="estado">Estado</label>
                                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" value="{{ $user->estado }}" required autocomplete="estado" autofocus>
    
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="cep">CEP</label>
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ $user->cep }}" required autocomplete="cep" autofocus>
    
                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group formBtn row mb-0">
                            <div class="col-md-4">
                                <button type="submit" class="btn btnEnviar">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btnCancelar">
                                    {{ __('Cancelar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- fim da Div formEditarPerfil -->

            </div><!-- fim da Div conteudo -->

            <div class="col-md-3 anuncioGoogleSidebar">
                anuncio do google adsense
            </div><!-- fim da Div anuncioGoogle -->
        </div>
    </div>

@endsection
