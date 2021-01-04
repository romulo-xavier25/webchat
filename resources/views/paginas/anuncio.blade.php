@extends('layouts.interna')

@section('title', '- Anúncio')

@section('content')

    <div class="col-md-8 offset-2 espacamentoAnuncio efeitoFumacaBloco">
        <div class="col-md-12 anuncioBannerTopoFull">

            @if ($anuncio->tipo_de_planos_id == 4)
                <img src="{{ asset('images/capa.jpeg') }}" alt="">                
            @endif

        </div><!-- fim da Div anuncioBannerTopoFull -->

        <div class="col-md-12 conteudoAnunciante">
            <div class="row">
                <div class="col-md-7 conteudoBlocoEsquerdo">
                    <div class="row">
                        <div class="col-md-4 logoAnunciante">
                            <img src="{{ asset('storage/upload/' . $anuncio->logotipo) }}" class="img-fluid borderRadius" alt="">
                        </div><!-- fim da Div logoAnunciante -->

                        <div class="col-md-8 tituloRedesSociaisAnunciantes">
                            <h1 class="h5 strong">{{ $anuncio->nome_da_empresa }}</h1>
                            <p>Escritório de Contabilidade</p>

                            @if ($anuncio->tipo_de_planos_id != 1)
                                <div class="col-md-12 iconesRedesSociaisAnunciante blocoSemPadding">
                                    <ul>
                                        <li>
                                            <a href="{{ $anuncio->link_facebook }}" target="_blank">
                                                <img src="{{ asset('images/face.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $anuncio->link_instagram }}" target="_blank">
                                                <img src="{{ asset('images/insta.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $anuncio->link_twitter }}" target="_blank">
                                                <img src="{{ asset('images/twitter.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $anuncio->link_linkedin }}" target="_blank">
                                                <img src="{{ asset('images/linkedin.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $anuncio->link_youtube }}" target="_blank">
                                                <img src="{{ asset('images/youtube.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tel:{{ $anuncio->telefone_whatsapp  }}" target="_blank">
                                                <img src="{{ asset('images/whats.png') }}" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif

                            
                        </div><!-- fim da Div tituloRedesSociais -->
                    </div><!-- fim da Div row -->
                   
                    <div class="col-md-12 blocoSobreAnunciante">
                        <h1 class="h6 strong">Sobre</h1>

                        <p>
                            {{ $anuncio->descricao }}
                        </p>

                        <hr class="marginTopBottom">
                    </div><!-- fim da Div blocoSobreAnunciante -->

                    <div class="col-md-12 blocoServicosAnunciante">
                        <h1 class="h6 strong">Serviços</h1>

                        <p>
                            {{ $anuncio->servicos }}
                        </p>

                        <hr class="marginTopBottom">
                    </div><!-- fim da Div blocoSobreAnunciante -->

                    @if ($user->tipo_de_usuario == "Síndico")

                        @if ($anuncio->tipo_de_planos_id > 2)
                            
                            <div class="col-md-12 blocoAvaliacaoAnunciante">
                                <h1 class="h6 strong">Avaliar este anúncio</h1>
                                <p>Dê sua opinião</p>
        
                                <div class="col-md-12 avaliarAnunciante blocoSemPadding">
        
                                    <form name="avaliacaoAvaliacao" action="{{ route('cadastrar-avaliacao') }}" method="post" enctype="multipart/form-data">
                                        @csrf
        
                                        <div class="col-md-12 blocoEstrelas">
                                            <input id="vazio" type="radio" name="estrela" value="" checked>
                                            
                                            <label for="estrela_um"><i class="fa fa-star"></i></label>
                                            <input id="estrela_um" type="radio" name="estrela" value="1">
        
                                            <label for="estrela_dois"><i class="fa fa-star" aria-hidden="true"></i></label>
                                            <input id="estrela_dois" type="radio" name="estrela" value="2">
        
                                            <label for="estrela_tres"><i class="fa fa-star" aria-hidden="true"></i></label>
                                            <input id="estrela_tres" type="radio" name="estrela" value="3">
        
                                            <label for="estrela_quatro"><i class="fa fa-star" aria-hidden="true"></i></label>
                                            <input id="estrela_quatro" type="radio" name="estrela" value="4">
        
                                            <label for="estrela_cinco"><i class="fa fa-star" aria-hidden="true"></i></label>
                                            <input id="estrela_cinco" type="radio" name="estrela" value="5">
        
                                            @error('estrela')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
        
                                        </div>
        
                                        <div class="col-md-12 inputTextAreaForm">
                                            <input type="hidden" name="anuncio_id" value="{{ $anuncio->id }}" />
        
                                            <span class="infoDetalhe">0/500</span>
                                            <textarea id="comentario" class="form-control textAreaForm" name="comentario" rows="3" placeholder="Descreva sua experiência com o anunciante (opcional)." autofocus></textarea>
                                            
                                            @error('comentario')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-md-12 inputBtnForm">
                                            <button type="submit" class="btn btnPadrao float-right ajusteBtnPadrao">Públicar</button>
                                        </div>                                
                                    </form>
        
                                </div><!-- fim da Div avaliarAnunciante -->
        
                            </div><!-- fim da Div blocoAvaliacaoAnunciante -->

                        @endif

                    @endif
                    
                    @if ($anuncio->tipo_de_planos_id > 2)

                        <div class="col-md-12 blocoComentarios">

                            @php
                                $cont = 0;
                            @endphp
    
                            @foreach ($users_avaliador_anuncio as $user_avaliador_anuncio)
    
                                @if ($cont <= 2)
                                    <div class="col-md-12 comentario">
                                @endif
    
                                @if ($cont >= 3)
                                    <div class="col-md-12 comentario displayNone">
                                @endif
    
                                    <div class="row">
                                        <div class="col-md-3 imgFotoPerfil">
    
                                            @if ($user_avaliador_anuncio->foto == "sem-foto")
                                                <img src="{{ asset('images/icon-user-temp.png') }}" class="img-fluid" alt="">  
                                            @endif
    
                                            @if ($user_avaliador_anuncio->foto != "sem-foto")
                                                <img src="{{ asset('storage/upload/' . $user_avaliador_anuncio->foto) }}" class="img-fluid" alt="">    
                                            @endif
    
                                        </div><!-- fim da Div imgFotoPerfil -->
        
                                        <div class="col-md-9 dadosPerfil">
                                            <h1 class="h6 strong">{{ $user_avaliador_anuncio->nome }}</h1>
                                            {{ $user_avaliador_anuncio->tipo_de_usuario }}
                                        </div><!-- fim da Div dadosPerfil -->
                                    </div><!-- fim da Div row -->
                                    <div class="row">
                                        <div class="col-md-3 quantidadeAvaliado">
    
                                            @if ($user_avaliador_anuncio->nota_avaliacao == 1)
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                            @endif
    
                                            @if ($user_avaliador_anuncio->nota_avaliacao == 2)
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                            @endif
    
                                            @if ($user_avaliador_anuncio->nota_avaliacao == 3)
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                            @endif
    
                                            @if ($user_avaliador_anuncio->nota_avaliacao == 4)
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                            @endif
    
                                            @if ($user_avaliador_anuncio->nota_avaliacao == 5)
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                            @endif
    
                                        </div><!-- fim da Div quantidadeAvaliado -->
        
                                        <div class="col-md-9 dataQueFoiAvaliado">
                                            {{ $user_avaliador_anuncio->created_at }}
                                        </div>
                                    </div><!-- fim da Div row -->
        
                                    <div class="row">
                                        <div class="col-md-12 textoComentario">
                                            <p>
                                                {{ $user_avaliador_anuncio->comentario }}
                                            </p>
                                        </div><!-- fim da Div quantidadeAvaliado -->
                                    </div><!-- fim da Div row -->
                                </div><!-- fim da Div comentario -->
                                
                                @php
                                    $cont++;
                                @endphp
    
                            @endforeach

                            @if (!empty($users_avaliador_anuncio))
                                <div class="col-md-12 verTodosComentarios">
                                    <a id="desocultarComentarios" class="btnDesocultarComentarios">Ver todos os avaliações</a>
                                </div>
                            @endif
    
                            
                            
                        </div><!-- fim da Div blocoComentarios -->

                    @endif

                </div><!-- fim da Div conteudoBlocoEsquerdo -->

                <div class="col-md-5 conteudoBlocoDireito">

                    @if ($anuncio->tipo_de_planos_id <= 2)

                        <div class="col-md-12 avaliacaoAnuncio">
                            <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                        </div><!-- fim da Div avaliacaoAnuncio -->

                    @endif

                    @if ($anuncio->tipo_de_planos_id > 2)

                        <div class="col-md-12 avaliacaoAnuncio">

                            @php

                                $todas_avaliacoes = array();
                                $todas_avaliacoes = $users_avaliador_anuncio;
                            
                                $media_total_avaliacoes = 0;

                                if (count($users_avaliador_anuncio) > 1) {
                                    for ($i=0; $i < count($users_avaliador_anuncio); $i++) {
                                        $key = array_keys($todas_avaliacoes);
                                        $media_total_avaliacoes += $todas_avaliacoes[$key[$i]]->nota_avaliacao;
                                    }
                                }
                                
                                if ($media_total_avaliacoes != 0) {
                                    $resultado_media_nota_avaliacao = $media_total_avaliacoes/$i;
                                }

                                if ($media_total_avaliacoes == 0) {
                                    $resultado_media_nota_avaliacao = 0;
                                }
                                
                            @endphp
    
                            @if ($resultado_media_nota_avaliacao == 0)
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao > 0 AND $resultado_media_nota_avaliacao <= 1)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao >= 1 AND $resultado_media_nota_avaliacao <= 1.6)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao >= 1.7 AND $resultado_media_nota_avaliacao <= 2.6)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao >= 2.7 AND $resultado_media_nota_avaliacao <= 3.6)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao >= 3.7 AND $resultado_media_nota_avaliacao <= 4.6)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star-o borderAmareloPadrao" aria-hidden="true"></i>
                            @endif
    
                            @if ($resultado_media_nota_avaliacao >= 4.7 AND $resultado_media_nota_avaliacao == 5)
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                                <i class="fa fa-star backgroundAmareloPadrao" aria-hidden="true"></i>
                            @endif
                            
                        </div><!-- fim da Div avaliacaoAnuncio -->

                    @endif

                    <div class="col-md-12 blocoHorarioFuncionamento">
                        <div class="col-md-12 blocoLocalizacaoAnunciante blocoSemPadding">
                            <img src="{{ asset('images/placeholder.svg') }}" class="iconeLocalizacaoAnunciante" alt="">
                            {{ $anuncio->endereco }}, {{ $anuncio->numero }}, {{ $anuncio->bairro }}, {{ $anuncio->cidade}} - {{ $anuncio->estado }}
                        </div><!-- fim da Div blocoLocalizacaoAnunciante -->

                        @if ($anuncio->tipo_de_planos_id > 1)

                            <div class="col-md-12 blocoEmailAnunciante blocoSemPadding">

                                @if ($anuncio->email == "")
                                    <img src="{{ asset('images/email.svg') }}" class="iconeEmailAnunciante" alt="">
                                    <a href="#" target="_blank"> www.seuemailnaofoicadastradonaplataforma.com.br </a>
                                @endif

                                @if ($anuncio->email != "")
                                    <img src="{{ asset('images/email.svg') }}" class="iconeEmailAnunciante" alt="">
                                    <a href="mailto:{{ $anuncio->email }}"> {{ $anuncio->email }} </a>
                                @endif
                                
                            </div><!-- fim da Div blocoEmailAnunciante -->
                            
                        @endif                        

                        <div class="col-md-12 blocoContatoAnunciante blocoSemPadding">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ asset('images/phone-call.svg') }}" class="iconeContatoAnunciante" alt="">
                                </div>
                                <div class="col-md-8">
                                    {{ $anuncio->telefone_principal }} <br />
                                    {{ $anuncio->telefone_adicional }}
                                </div>
                            </div>
                        </div><!-- fim da Div blocoContatoAnunciante -->

                        @if ($anuncio->tipo_de_planos_id != 1)

                            <div class="col-md-12 blocoSiteAnunciante blocoSemPadding">
                                

                                @php
                                    $url_host = parse_url($anuncio->link_site, PHP_URL_HOST);
                                    $parte_url_host = explode(".", $url_host);
                                    if(count($parte_url_host) == 4){
                                        $url_site = $parte_url_host[1] . "." . $parte_url_host[2] . "." . $parte_url_host[3];
                                    } 
                                    
                                    if(count($parte_url_host) == 3){
                                        $url_site = "www." . $parte_url_host[0] . "." . $parte_url_host[1] . "." . $parte_url_host[2];
                                    }
                                @endphp

                                @if ($anuncio->link_site == "")
                                    <img src="{{ asset('images/globe.svg') }}" class="iconeSiteAnunciante" alt="">
                                    <a href="#" target="_blank"> www.seusitenaofoicadastradonaplataforma.com.br </a>
                                @endif

                                @if ($anuncio->link_site != "")
                                    <img src="{{ asset('images/globe.svg') }}" class="iconeSiteAnunciante" alt="">
                                    <a href="{{ $anuncio->link_site }}" target="_blank"> {{ $url_site }} </a>
                                @endif
                                
                            </div><!-- fim da Div blocoSiteAnunciante -->

                        @endif

                        @if ($anuncio->tipo_de_planos_id > 2)

                            <div class="col-md-12 blocoHorarioFuncionamentoAnunciante blocoSemPadding">
                                <img src="{{ asset('images/three-oclock.svg') }}" class="iconeHorarioFuncionamentoAnunciante" alt="">
                                Horário de Funcionamento
                                <div class="row">
                                    <div class="col-md-6 blocoDiaDaSemanaAnunciante">
                                        <p class="strong statusHorarioFuncionamentoAnunciante">
                                            Aberto agora*
                                        </p>
                                        <p class="strong diaSemanaAnunciante">
                                            Dia
                                        </p>


                                        @if ($anuncio->domingo_abre > 0)
                                            <p class="diaSemanaAnunciante">Domingo</p>
                                        @endif

                                        @if ($anuncio->segunda_abre > 0)
                                            <p class="diaSemanaAnunciante">Segunda</p>
                                        @endif

                                        @if ($anuncio->terca_abre > 0)
                                            <p class="diaSemanaAnunciante">Terça</p>
                                        @endif

                                        @if ($anuncio->quarta_abre > 0)
                                            <p class="diaSemanaAnunciante">Quarta</p>
                                        @endif

                                        @if ($anuncio->quinta_abre > 0)
                                            <p class="diaSemanaAnunciante">Quinta</p>
                                        @endif

                                        @if ($anuncio->sexta_abre > 0)
                                            <p class="diaSemanaAnunciante">Sexta</p>
                                        @endif

                                        @if ($anuncio->sabado_abre > 0)
                                            <p class="diaSemanaAnunciante">Sábado</p>
                                        @endif

                                    </div><!-- fim da Div blocoDiaDaSemanaAnunciante -->

                                    <div class="col-md-6 blocoHorarioAnunciante">
                                        <p class="strong horarioAnunciante">
                                            Horário
                                        </p>

                                        @if ($anuncio->domingo_abre > 0)
                                            <p>{{ $anuncio->domingo_abre }} às {{ $anuncio->domingo_fecha }}</p>
                                        @endif

                                        @if ($anuncio->segunda_abre > 0)
                                            <p>{{ $anuncio->segunda_abre }} às {{ $anuncio->segunda_fecha }}</p>
                                        @endif

                                        @if ($anuncio->terca_abre > 0)
                                            <p>{{ $anuncio->terca_abre }} às {{ $anuncio->terca_fecha }}</p>
                                        @endif

                                        @if ($anuncio->quarta_abre > 0)
                                            <p>{{ $anuncio->quarta_abre }} às {{ $anuncio->quarta_fecha }}</p>
                                        @endif

                                        @if ($anuncio->quinta_abre > 0)
                                            <p>{{ $anuncio->quinta_abre }} às {{ $anuncio->quinta_fecha }}</p>
                                        @endif

                                        @if ($anuncio->sexta_abre > 0)
                                            <p>{{ $anuncio->sexta_abre }} às {{ $anuncio->sexta_fecha }}</p>
                                        @endif

                                        @if ($anuncio->sabado_abre > 0)
                                            <p>{{ $anuncio->sabado_abre }} às {{ $anuncio->sabado_fecha }}</p>
                                        @endif

                                    </div><!-- fim da Div blocoHorarioAnunciante -->
                                </div><!-- fim da Div row -->
                            </div><!-- fim da Div blocoSiteAnunciante -->

                        @endif

                    </div><!-- fim da Div blocoHorarioFuncionamento -->
                </div><!-- fim da Div conteudoBlocoDireito -->
            </div><!-- fim da Div row -->
        </div><!-- fim da Div conteudoAnuncio -->
    </div><!-- fim da Div efeitoFumacaBloco -->

@endsection
