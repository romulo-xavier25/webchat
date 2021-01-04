@extends('layouts.interna')

@section('title', '- Meus Anúncios')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2 sidebarMenu">
                @include('layouts.sidebar_menu_perfil')
            </div><!-- fim da Div sidebarMenu -->

            <div class="col-md-7 paginaMeusAnuncios">

                <div class="col-md-12 tituloPaginas">
                    <h1 class="h3">Meus anúncios</h1>
                    <span>Configure os seu anúncio</span>
                </div>

                @foreach ($anuncios as $anuncio)
                    
                    <div class="col-md-12 conteudoMeusAnuncios">
                        <div class="col-md-12 blocoMeusAnuncio">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="col-md-12 imgLogo">

                                        @php
                                            $imagem = "storage/upload/" . $anuncio->logotipo;
                                            list($largura, $altura) = getimagesize($imagem);
                                            //echo "Tamanho da Imagem: $largura x $altura px";
                                        @endphp

                                        @if ($largura == $altura)
                                            <img src="{{ asset('storage/upload/' . $anuncio->logotipo) }}" class="comLogotipo">
                                        @endif

                                        @if ($largura != $altura)
                                            <img src="{{ asset('storage/upload/' . $anuncio->logotipo) }}" class="logotipoRetangulo">
                                        @endif

                                    </div>
                                </div>
        
                                <div class="col-md-9 infoFornecedor">
                                
                                    <div class="row">
                                        <div class="col-md-4 col-xs-12 tituloEmpresa">
                                        <strong>{{ $anuncio->nome_da_empresa }}</strong>
                                        </div>
            
                                        <div class="col-md-4 col-xs-12 estrelasFornecedor">
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
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao > 0 AND $resultado_media_nota_avaliacao <= 1)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao >= 1 AND $resultado_media_nota_avaliacao <= 1.6)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao >= 1.7 AND $resultado_media_nota_avaliacao <= 2.6)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao >= 2.7 AND $resultado_media_nota_avaliacao <= 3.6)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao >= 3.7 AND $resultado_media_nota_avaliacao <= 4.6)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaVazia" aria-hidden="true"></i>
                                            @endif
                    
                                            @if ($resultado_media_nota_avaliacao >= 4.7 AND $resultado_media_nota_avaliacao == 5)
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                                <i class="fa fa-star estrelaPreenchida" aria-hidden="true"></i>
                                            @endif
                                        </div>
            
                                        <div class="col-md-4 col-xs-12 tipoDePlano">
                                            <span class="tipoDePlanoPadrao">
                                                @if ($anuncio->tipo_de_planos_id == 1)
                                                    Plano Gratuito
                                                @endif

                                                @if ($anuncio->tipo_de_planos_id == 2)
                                                    Plano Básico
                                                @endif

                                                @if ($anuncio->tipo_de_planos_id == 3)
                                                    Plano Profissional
                                                @endif

                                                @if ($anuncio->tipo_de_planos_id == 4)
                                                    Plano Premium
                                                @endif
                                            </span>
                                        </div>
            
                                        <div class="col-md-12 infoRestanteFornecedor">
                                            <span></span>
                                        </div>
                                        <div class="col-md-12 blocoInformacaoFornecedor">
                                            <div class="row">
                                                <div class="col-md-9 blocoSemPadding">
                                                    <div class="col-md-12 enderecoFornecedor fontSizeText">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        {{ $anuncio->endereco }}, {{ $anuncio->numero }} - {{ $anuncio->bairro }}
                                                    </div>
                                                    <div class="col-md-12 contatoFornecedor fontSizeText">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        {{ $anuncio->telefone_principal }}
                        
                                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                                        <span id="telefone">{{ $anuncio->telefone_adicional }}</span>
                        
                                                        @if ($anuncio->tipo_de_planos_id > 1)
                                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                            {{ $anuncio->telefone_whatsapp }}
                                                        @endif



                                                    </div><!-- fim da Div blocoSemPadding -->
                                                </div><!-- fim da Div blocoSemPadding -->
                                                <div class="col-md-3 botaoAlterar">
                                                    <a href="anuncio/editar/{{ $anuncio->slug }}" class="btn btnAlterar">alterar</a>
                                                </div>
                                            </div>
                                        </div><!-- fim da Div blocoInformacaoFornecedor -->
                                    </div><!-- fim da Div row -->
                                </div><!-- fim da Div infoFornecedor -->
                            </div><!-- fim da Div row -->
                        </div><!-- fim da Div blocoMeusAnuncio -->
                    </div><!-- fim da Div conteudoPadrao -->

                @endforeach

            </div><!-- fim da Div paginaMeusAnuncios -->

            <div class="col-md-3 anuncioGoogleSidebar">
                anuncio do google adsense
            </div><!-- fim da Div anuncioGoogle -->
        </div>
    </div>

@endsection
