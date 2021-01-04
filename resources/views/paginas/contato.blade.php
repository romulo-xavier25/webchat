@extends('layouts.interna')

@section('title', '- Contato')

@section('content')

    <div class="col-md-12 fullPaginaContato">
        <div class="container">
            <div class="col-md-12 contatoTitulo">
                <h1 class="h4">
                    Ouvidoria Buscasíndico
                </h1>
                <p class="h6">
                    Como podemos ajudar?
                </p>
            </div><!-- fim da Div contatoTitulo -->

            <div class="col-md-8 offset-2 conteudoContato">
                <p class="fontSize">Nós queremos saber sua opinião para melhorar sempre nossos processos, produtos e serviços.
                    Assim, entre em contato com nossa Ouvidoria se você tiver alguma sugestão, crítica, elogio ou
                    reclamação. Nossa equipe está apta para auxiliar você de segunda a sexta-feira, das 8h às 18h.</p>

                <p class="fontSize">No caso de reclamação, antes de entrar em contato com a Ouvidoria, é importante que você já
                    tenha buscado solução junto à nossa central de atendimento via chat e tenha aguardado o
                    prazo informado para o atendimento.</p>


                <h2 class="h5 text-center strong marginTop">
                    Para enviar a sua mensagem, preencha os campos abaixo:
                </h2>
            </div><!-- fim da Div conteudoContato -->

            <div class="col-md-6 offset-3 formContatoOuvidoria">
                <form name="cadastrarUsuario" method="POST" action="{{ route('contato') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="nome_completo">Nome completo:</label>
                            <input id="nome_completo" type="text" class="form-control @error('nome_completo') is-invalid @enderror" name="nome_completo" value="{{ old('nome_completo') }}" required autocomplete="nome_completo" autofocus>

                            @error('nome_completo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">E-mail:</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="assunto">Assunto:</label>
                            <input id="assunto" type="text" class="form-control @error('assunto') is-invalid @enderror" name="assunto" value="{{ old('assunto') }}" required autocomplete="assunto">

                            @error('assunto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="mensagem">Mensagem:</label>
                            <textarea id="mensagem" class="form-control noResize @error('mensagem') is-invalid @enderror" name="mensagem" cols="30" rows="10" value="{{ old('mensagem') }}" required autocomplete="mensagem" autofocus></textarea>
                            <span class="infoDetalhe">2000 caracteres</span>
                            
                            @error('mensagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btnPadrao">
                                {{ __('Enviar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div><!-- fim da Div formContatoOuvidoria -->
        </div><!-- fim da Div container -->
    </div><!-- fim da Div fullPaginaContato -->

@endsection
