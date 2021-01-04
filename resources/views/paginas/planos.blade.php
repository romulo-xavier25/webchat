@extends('layouts.interna')

@section('title', '- Planos')

@section('content')

    <div class="col-md-12 fullPaginaPlanos">

        <div class="container">
            <div class="col-md-12 planosTitulo">
                <h1 class="h4">
                    Escolha o melhor plano para o seu negócio
                </h1>
                <p class="h6">
                    Quanto mais longa sua assinatura, mais você economiza
                </p>
            </div><!-- fim da Div contatoTitulo -->

            <div class="col-md-7 opcoesPlanos">
                <div class="row">
                    <div class="col-md-3 borderRight blocoOpcoesPlanos">
                        <label class="labelPlanos">
                            <input id="tresAnos" type="radio" name="radio" value="tresAnos" onclick="onClickFormOpcoesPlanosTresAnos()">
                            <strong class="strong">3 anos</strong>
                            <span class="checkmark"></span>

                            <div class="valorDesconto">
                                -40%
                            </div><!-- fim da Div valorDesconto -->
                        </label>
                        
                    </div><!-- fim da Div blocoOpcoesPlanos -->

                    <div class="col-md-3 borderRight blocoOpcoesPlanos">
                        <label class="labelPlanos">
                            <input id="umAno" type="radio" name="radio" value="umAno" onclick="onClickFormOpcoesPlanosUmAno()">
                            <strong class="strong">1 ano</strong>
                            <span class="checkmark"></span>
                            <div class="valorDesconto">
                                -35%
                            </div><!-- fim da Div valorDesconto -->
                          </label>
                    </div><!-- fim da Div blocoOpcoesPlanos -->

                    <div class="col-md-3 borderRight blocoOpcoesPlanos">
                        <label class="labelPlanos">
                            <input id="seisMeses" type="radio" name="radio" value="seisMeses" onclick="onClickFormOpcoesPlanosSeisMeses()">
                            <strong class="strong">6 meses</strong>
                            <span class="checkmark"></span>
                            <div class="valorDesconto">
                                -30%
                            </div><!-- fim da Div valorDesconto -->
                        </label>
                    </div><!-- fim da Div blocoOpcoesPlanos -->

                    <div class="col-md-3 blocoOpcoesPlanos">
                        <label class="labelPlanos">
                            <input id="umMes" type="radio" name="radio" checked="checked" value="umMes" onclick="onClickFormOpcoesPlanosUmMes()">
                            <div class="ajuesteOpcaoPlano">
                                <strong class="strong">1 Mês</strong>
                            </div>
                            <span class="checkmark"></span>
                          </label>
                    </div><!-- fim da Div blocoOpcoesPlanos -->
                </div><!-- fim da Div row -->
            </div><!-- fim da Div opcoesPlanos -->

            <div class="col-md-12 tiposPlanos">
                <div class="row">
                    <div class="col-md-3 marginTop efeitoFumaca zoom2">
                        <div class="col-md-12 blocoTiposPlanos">
                            <div class="col-md-12 borderBottomTiposPlanos">
                                <h1 class="h5 strong text-center">
                                        GRÁTIS
                                </h1>
                                <p class="text-center efeitoAjustePadraoTiposPlanos">Seja um fornecedor cadastrado</p>
                            </div>
                            <div class="col-md-12 paddingTopBottom text-center borderBottomTiposPlanos">
                                <div class="blocoDestaqueDesconto">
                                    SEMPRE GRATUITO
                                </div>

                                <div class="col-md-12 strong valorPlano">
                                    R$<strong class="h2 marginTiposPlanos strong text-center">00,00</strong>/mês
                                </div>

                                <a href="#" class="btn btnTiposPlanos">COMECE AGORA</a>
                            </div>
                            <div class="col-md-12 blocoSemPadding">
                                <ul class="vantagensTipoPlano">
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Logotipo</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Descrição do Negócio</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Informações Adicionais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> 01 Categoria</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Endereço</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Telefones</li>
                                </ul>
                            </div>
                        </div><!-- fim da Div blocoTiposPlanos -->
                    </div><!-- fim da Div zoom -->

                    <div class="col-md-3 marginTop zoom2">
                        <div class="col-md-12 blocoTiposPlanos">
                            <div class="col-md-12 borderBottomTiposPlanos">
                                <h1 class="h5 strong text-center">
                                        BÁSICO
                                </h1>
                                <p class="text-center efeitoAjustePadraoTiposPlanos">Ganhe visibilidade</p>
                            </div>
                            <div class="col-md-12 paddingTopBottom text-center borderBottomTiposPlanos">
                                <div class="blocoDestaqueDesconto">
                                    ECONOMIZE 85%
                                </div>

                                <div class="col-md-12 strong valorPlano">
                                    R$<strong id="basico" class="h2 marginTiposPlanos strong text-center">39,90</strong>/mês
                                </div>

                                <a href="#" class="btn btnTiposPlanos">ASSINE AGORA</a>
                            </div>
                            <div class="col-md-12 blocoSemPadding">
                                <ul class="vantagensTipoPlano">
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Logotipo</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Descrição do Negócio</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Informações Adicionais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> 05 Categoria</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Endereço</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Telefones</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Sites e e-mail</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Whatsapp</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Redes Sociais</li>
                                </ul>
                            </div>
                        </div><!-- fim da Div blocoTiposPlanos -->
                    </div><!-- fim da Div zoom -->

                    <div class="col-md-3 ajusteResponsivoPlanos zoom2">
                        <div class="col-md-12 text-center maisPopular">
                            <h1 class="h6">MAIS POPULAR</h1>
                        </div>

                        <div class="col-md-12 blocoTiposPlanos">
                            <div class="col-md-12 borderBottomTiposPlanos">
                                <h1 class="h5 strong text-center">
                                        PRO
                                </h1>
                                <p class="text-center efeitoAjustePadraoTiposPlanos">Conquiste resultados</p>
                            </div>
                            <div class="col-md-12 paddingTopBottom text-center borderBottomTiposPlanos">
                                <div class="blocoDestaqueDesconto">
                                    ECONOMIZE 65%
                                </div>

                                <div class="col-md-12 strong valorPlano">
                                    R$<strong id="profissional" class="h2 marginTiposPlanos strong text-center">59,90</strong>/mês
                                </div>

                                <a href="#" class="btn btnTiposPlanos">ASSINE AGORA</a>
                            </div>
                            <div class="col-md-12 blocoSemPadding">
                                <ul class="vantagensTipoPlano">
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Logotipo</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Descrição do Negócio</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Informações Adicionais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> 10 Categoria</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Endereço</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Telefones</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Sites e e-mail</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Whatsapp</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Redes Sociais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Horário de Funcionamento</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Avaliação</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Chat Exlusivo</li>
                                </ul>
                            </div>
                        </div><!-- fim da Div blocoTiposPlanos -->
                    </div><!-- fim da Div zoom -->

                    <div class="col-md-3 marginTop zoom2">
                        <div class="col-md-12 blocoTiposPlanos">
                            <div class="col-md-12 borderBottomTiposPlanos">
                                <h1 class="h5 strong text-center">
                                        BUSINESS
                                </h1>
                                <p class="text-center efeitoAjustePadraoTiposPlanos">Aumente suas vendas</p>
                            </div>
                            <div class="col-md-12 paddingTopBottom text-center borderBottomTiposPlanos">
                                <div class="blocoDestaqueDesconto">
                                    ECONOMIZE 50%
                                </div>

                                <div class="col-md-12 strong valorPlano">
                                    R$<strong id="business" class="h2 marginTiposPlanos strong text-center">99,90</strong>/mês
                                </div>

                                <a href="#" class="btn btnTiposPlanos">ASSINE AGORA</a>
                            </div>
                            <div class="col-md-12 blocoSemPadding">
                                <ul class="vantagensTipoPlano">
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Logotipo</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Descrição do Negócio</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Informações Adicionais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> 15 Categoria</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Endereço</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Telefones</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Sites e e-mail</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Whatsapp</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Redes Sociais</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Horário de Funcionamento</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Avaliação</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Chat Exlusivo</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Anúncio de Pesquisa</li>
                                    <li><img src="{{ asset('images/check.png') }}" alt=""> Capa Exclusiva</li>
                                </ul>
                            </div>
                        </div><!-- fim da Div blocoTiposPlanos -->
                    </div><!-- fim da Div zoom -->
                    
                </div><!-- fim da Div row -->
            </div><!-- fim da Div tiposPlanos -->

            <div class="col-md-12 infoSejaFornecedorProfissional">
                <h1 class="h3 strong text-center">
                    Seja um fornecedor profissional
                </h1>
                <div class="row">
                    <div class="col-md-5 offset-1 txtInfoFornecedor">
                        <h1 class="h4 marginBottom">
                            Consiga mais negócio em <br />
                            condomínios da sua região
                        </h1>

                        <p>
                            Torne-se um fornecedor profissional, seja visto por milhares de 
                            pessoas interessadas em seu serviço da sua cidade.
                        </p>

                        <p>
                            Aumente suas vendas atendendo a pedidos de síndicos e 
                            administradores prediais.
                        </p>
                    </div><!-- fim da Div txtInfoFornecedor -->

                    <div class="col-md-5 imgGrafico">
                        <img src="{{ asset('images/planos.png') }}" class="img-fluid" alt="">
                    </div><!-- fim da Div imgGrafico -->
                </div><!-- fim da Div row -->
            </div><!-- fim da Div infoSejaFornecedorProfissional -->

            <div class="col-md-12 vantagensAnunciar">
                <div class="col-md-12 titutloVantagensAnunciar">
                    <h1 class="h3 strong text-center">
                        Vantagens em anunciar no buscasíndico
                    </h1>
                </div><!-- fim da Div titutloVantagensAnunciar -->

                <div class="row">
                    <div class="col-md-4 colunaVantagensAnunciar">
                        <div class="col-md-10 backgroundColorMarrom offset-1">
                            <img src="{{ asset('images/pagina.png') }}" class="img-fluid" alt="">
                        </div><!-- fim da Div vantagensAnunciar -->

                        <div class="col-md-12 paddingTop">
                            <h1 class="h4 strong text-center">
                                Página Exclusiva
                            </h1>

                            <p class="text-center">
                                Tenha uma pagina exclusiva <br />
                                com as informações do <br />
                                seu negócio.
                            </p>
                        </div><!-- fim da Div paddingTop -->
                    </div><!-- fim da Div colunaVantagensAnunciar -->

                    <div class="col-md-4 colunaVantagensAnunciar">
                        <div class="col-md-10 backgroundColorMarrom offset-1">
                            <img src="{{ asset('images/chat.png') }}" class="img-fluid" alt="">
                        </div><!-- fim da Div vantagensAnunciar -->

                        <div class="col-md-12 paddingTop">
                            <h1 class="h4 strong text-center">
                                Chat Online
                            </h1>

                            <p class="text-center">
                                Converse e negocie todos <br />
                                os serviços diretamente <br />
                                pelo chat exclusivo.
                            </p>
                        </div><!-- fim da Div paddingTop -->
                    </div><!-- fim da Div colunaVantagensAnunciar -->

                    <div class="col-md-4 colunaVantagensAnunciar">
                        <div class="col-md-10 backgroundColorMarrom paddingFull offset-1">
                            <img src="{{ asset('images/busca.png') }}" class="imgFluid" alt="">
                        </div><!-- fim da Div vantagensAnunciar -->

                        <div class="col-md-12 paddingTop">
                            <h1 class="h4 strong text-center">
                                1&deg; na Busca
                            </h1>

                            <p class="text-center">
                                Fique no topo da busca quando <br />
                                clientes buscarem serviços <br />
                                similares ao seus.
                            </p>
                        </div><!-- fim da Div paddingTop -->
                    </div><!-- fim da Div colunaVantagensAnunciar -->

                </div><!-- fim da Div row -->

                <div class="row marginTop">
                        <div class="col-md-4 colunaVantagensAnunciar">
                            <div class="col-md-10 backgroundColorMarrom offset-1">
                                <img src="{{ asset('images/capa.png') }}" class="img-fluid" alt="">
                            </div><!-- fim da Div vantagensAnunciar -->
    
                            <div class="col-md-12 paddingTop">
                                <h1 class="h4 strong text-center">
                                    Capa Exclusiva
                                </h1>
    
                                <p class="text-center">
                                    Tenha uma capa exclusiva na <br />
                                    sua pagina, investindo <br />
                                    no plano Business.
                                </p>
                            </div><!-- fim da Div paddingTop -->
                        </div><!-- fim da Div colunaVantagensAnunciar -->
    
                        <div class="col-md-4 colunaVantagensAnunciar">
                            <div class="col-md-10 backgroundColorMarrom2 offset-1">
                                <img src="{{ asset('images/avaliação.png') }}" class="img-fluid" alt="">
                            </div><!-- fim da Div vantagensAnunciar -->
    
                            <div class="col-md-12 paddingTop">
                                <h1 class="h4 strong text-center">
                                    Avaliação
                                </h1>
    
                                <p class="text-center">
                                    Seja avaliado por milhares de <br />
                                    síndicos e seja um fornecedor <br />
                                    reconhecido no mercado.
                                </p>
                            </div><!-- fim da Div paddingTop -->
                        </div><!-- fim da Div colunaVantagensAnunciar -->
    
                        <div class="col-md-4 colunaVantagensAnunciar">
                            <div class="col-md-10 backgroundColorMarrom offset-1">
                                <img src="{{ asset('images/categoria.png') }}" class="img-fluid" alt="">
                            </div><!-- fim da Div vantagensAnunciar -->
    
                            <div class="col-md-12 paddingTop">
                                <h1 class="h4 strong text-center">
                                    Categorias
                                </h1>
    
                                <p class="text-center">
                                    Através do plano escolhido <br />
                                    permitem a veiculação <br />
                                    em mais categorias.
                                </p>
                            </div><!-- fim da Div paddingTop -->
                        </div><!-- fim da Div colunaVantagensAnunciar -->
    
                    </div><!-- fim da Div row -->
            </div><!-- fim da Div vantagensAnunciar -->

        </div><!-- fim da Div container -->

    </div><!-- fim da Div fullPaginaPlanos -->

@endsection
