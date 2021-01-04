@extends('layouts.interna')

@section('title', '- Resultado')

@section('content')

    <div class="container">
        <div class="col-md-12 resultadoTitulo">
            <h1 class="h1">
                Todos os anúncios
            </h1>
            <p>
                Resultados encontrados de anúncios
            </p>
        </div>

        <div class="col-md-12 resultadoPesquisaFull">
            <div class="row">
                <div class="col-md-2 categorias">
                    <div class="col-md-12 headerCategoria">
                        Categorias
                    </div>

                    <ul class="menuCategorias" >

                        @foreach($categorias as $categoria)
                            <li>
                                <a href="categoria/{{ $categoria->slug }}">
                                    {{$categoria->nome_da_categoria}}
                                </a>
                            </li>    
                        @endforeach
                    </ul>

                </div>

                <div class="col-md-7 conteudoPaginaResultados">

                    @if (count($anuncios) > 0 || count($anunciosOrderBy) > 0)

                        @php
                            $cont = 0;
                        @endphp
                    
                        @for ($i = 0; $i < count($anuncios); $i++)
                        
                            @if ($anuncios[$i]->tipo_de_planos_id == 4 && $cont < 3)

                                <div class="col-md-12 anunciosDestaque">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="col-md-12 imgLogo">
                                                <a href="anuncio/{{ $anuncios[$i]->slug }}">
                                                    <img src="{{ asset('storage/upload/' . $anuncios[$i]->logotipo) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                    
                                        <div class="col-md-9 infoFornecedor">
                                            <div class="row">
                                                <div class="col-md-7 tituloEmpresa">
                                                    <a href="anuncio/{{ $anuncios[$i]->slug }}">
                                                        <strong>{{ $anuncios[$i]->nome_da_empresa }}</strong>
                                                    </a>
                                                </div>
                
                                                <div class="col-md-5 estrelasFornecedor">

                                                    @php
                                                        $users_avaliador_anuncio = DB::table('users')
                                                                                            ->join('avaliar_anuncios', 'users.id', '=', 'avaliar_anuncios.avaliador_anuncio_id')
                                                                                            ->select('users.*', 'avaliar_anuncios.*')
                                                                                            ->get();

                                                        $user_avaliador_anuncio_especifico = array();

                                                        for($i = 0; $i < count($users_avaliador_anuncio); $i++){
                                                            if ($users_avaliador_anuncio[$i]->anuncio_id == $anuncio->id){
                                                                $user_avaliador_anuncio_especifico[$i] = $users_avaliador_anuncio[$i];
                                                            }
                                                        }

                                                        $users_avaliador_anuncio = $user_avaliador_anuncio_especifico;

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
                                                <div class="col-md-12 infoRestanteFornecedor fontSizeText">
                                                    <span>Contabildade</span>
                                                </div>
                                                <div class="col-md-12 enderecoFornecedor fontSizeText">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{ $anuncios[$i]->endereco }}, {{ $anuncios[$i]->numero }} - {{ $anuncios[$i]->bairro }}
                                                </div>

                                                @if (Auth::check())
                                                    <div class="col-md-12 contatoFornecedor fontSizeText">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        {{ $anuncios[$i]->telefone_principal }}
                    
                                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                                        {{ $anuncios[$i]->telefone_adicional }}
                    
                                                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                        {{ $anuncios[$i]->telefone_whatsapp }}
                                                    </div>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fim da Div anunciosDestaque -->

                                @php
                                    $cont++;
                                @endphp

                            @endif
                            
                        @endfor

                        <div class="col-md-12 marginTop blocoSemPadding">
                            @foreach ($anunciosOrderBy as $anuncioOrderBy)
                                <div class="col-md-12 anunciosComum">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="col-md-12 imgLogo">
                                                <a href="anuncio/{{ $anuncioOrderBy->slug }}">
                                                    <img src="{{ asset('storage/upload/' . $anuncioOrderBy->logotipo) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                    
                                        <div class="col-md-9 infoFornecedor">
                                            <div class="row">
                                                <div class="col-md-7 col-xs-12 tituloEmpresa">
                                                    <a href="anuncio/{{ $anuncioOrderBy->slug }}">
                                                        <strong>{{ $anuncioOrderBy->nome_da_empresa }}</strong>
                                                    </a>
                                                </div>
                
                                                <div class="col-md-5 col-xs-12 estrelasFornecedor">

                                                        @php
                                                        $users_avaliador_anuncio = DB::table('users')
                                                                                            ->join('avaliar_anuncios', 'users.id', '=', 'avaliar_anuncios.avaliador_anuncio_id')
                                                                                            ->select('users.*', 'avaliar_anuncios.*')
                                                                                            ->get();

                                                        $user_avaliador_anuncio_especifico = array();

                                                        for($i = 0; $i < count($users_avaliador_anuncio); $i++){
                                                            if ($users_avaliador_anuncio[$i]->anuncio_id == $anuncio->id){
                                                                $user_avaliador_anuncio_especifico[$i] = $users_avaliador_anuncio[$i];
                                                            }
                                                        }

                                                        $users_avaliador_anuncio = $user_avaliador_anuncio_especifico;

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
                                                <div class="col-md-12 infoRestanteFornecedor fontSizeText">
                                                    <span>Contabildade</span>
                                                </div>
                                                <div class="col-md-12 enderecoFornecedor fontSizeText">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    {{ $anuncioOrderBy->endereco }}, {{ $anuncioOrderBy->numero }} - {{ $anuncioOrderBy->bairro }}
                                                </div>

                                                @if (Auth::check())
                                                    <div class="col-md-12 contatoFornecedor fontSizeText">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                        {{ $anuncioOrderBy->telefone_principal }}
                    
                                                        <i class="fa fa-mobile" aria-hidden="true"></i>
                                                        {{ $anuncioOrderBy->telefone_adicional }}
                    
                                                        @if ($anuncioOrderBy->tipo_de_planos_id > 1)
                                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                                            {{ $anuncioOrderBy->telefone_whatsapp }}                                                       
                                                        @endif
                                                    </div>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- fim da Div anunciosComum -->
                            @endforeach
                        </div>

                    @else
                        <p class="strong">
                            Nenhum anúncio foi encontrado.
                        </p>
                    @endif

                    <div class="col-md-12 paginacao">

                        @if (count($anunciosOrderBy) > 0)

                            @php
                                /*$pagination = $anunciosOrderBy->links();
                                $pagination = str_replace('&laquo;', 'POSTS RECENTES <i class="fa fa-arrow-right"></i>', $pagination);
                                $pagination = str_replace('&raquo;', '<i class="fa fa-arrow-left"></i> MAIS POSTS', $pagination);

                                echo $pagination;*/

                            @endphp

                            {{ $anunciosOrderBy->links() }}

                        @endif

                    </div>

                </div>

                <div class="col-md-3">
                    anuncio do google adsense
                </div>
            </div><!-- fim da Div row -->
        </div><!-- fim da Div resultadoPesquisaFull -->
    </div><!-- fim da Div container -->

@endsection
