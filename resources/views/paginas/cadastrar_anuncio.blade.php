@extends('layouts.interna')

@section('title', '- Cadastrar Anúncio')

@section('content')

    <div class="container">
        <div class="col-md-12 conteudoCadastrarAnuncio">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-12 tituloPagina">
                        <h1 class="h3">Cadastre seu Negócio</h1>
                        <p>Preencha os campos abaixo para cadastrar um local ou estabelecimento.</p>
                    </div>

                    <div class="col-md-12 conteudoPaginaCadastrarAnuncio">

                        @include('includes.alerts')

                        <form name="cadastrarAnuncio" method="POST" action="{{ route('cadastrar-anuncio') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                                <div class="col-md-3 text-center">
                                    <div class="col-md-12 fotoLogoAnuncio">
                                        <div class="personal-image">
                                            <label class="label">
                                                <input type="file" name="fotoPerfil" />
                                                <figure class="personal-figure">
                                                    <img src="{{ asset('images/camera-white.png') }}" class="iconeCameraFotoPerfilAnuncio">
                                                    <figcaption class="personal-figcaption">
                                                    </figcaption>
                                                </figure>
                                            </label>
                                        </div>
                                    </div><!-- fim da Div fotoLogoAnuncio -->
                                    <span class="ajusteFonte">Tamanho 104x104px - JPEG ou PNG</span>
                                </div>

                                <div class="col-md-9">
                                    
                                    @if ($tipo_de_anuncio == 4)
                                        <div class="col-md-12 fotoCapaPerfilAnuncio">
                                            <div class="personal-image">
                                                <label class="label">
                                                    <input type="file" name="fotoCapa" />
                                                    <figure class="personal-figure">
                                                        <img src="{{ asset('images/camera-white.png') }}">
                                                        <figcaption class="personal-figcaption">
                                                        </figcaption>
                                                    </figure>
                                                </label>
                                            </div>
                                            <span class="float-right ajusteFonte">Tamanho 775x180px - JPEG ou PNG</span>
                                        </div><!-- fim da Div fotoCapaPerfilAnuncio -->
                                    @endif

                                    <div class="col-md-12">
                                        <label for="nome">Nome do Negócio</label>
                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome" autofocus>
            
                                        @error('nome')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="descricao">Descrição do Negócio</label>
                                        <textarea id="descricao" rows="6" class="form-control @error('descricao') is-invalid @enderror" name="descricao" required autocomplete="descricao" autofocus></textarea>
                                        <span class="infoDetalhe">2000 caracteres</span>

                                        @error('descricao')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="servicos">Serviços</label>
                                        <textarea id="servicos" rows="6" class="form-control @error('servicos') is-invalid @enderror" name="servicos" required autocomplete="servicos" autofocus></textarea>
                                        <span class="infoDetalhe">2000 caracteres</span>

                                        @error('servicos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 displayTable">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="categorias">Categorias</label>
                                                <select class="browser-default custom-select" name="categorias">
                                                    @foreach ($categorias as $categoria)
                                                        <option value="{{$categoria->id}}">{{ $categoria->nome_da_categoria }}</option>
                                                    @endforeach
                                                </select>

                                                @error('categorias')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="cpfcnpj">CPF/CNPJ</label>
                                                <input id="cpfcnpj" type="text" class="form-control @error('cpfcnpj') is-invalid @enderror" name="cpfcnpj" onblur="capturarInputCpfCnpj(this.value)" required autocomplete="cpfcnpj" autofocus>
                    
                                                @error('cpfcnpj')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="telefonePrincipal">Telefone Principal</label>
                                                <input id="telefonePrincipal" type="tel" class="form-control @error('telefonePrincipal') is-invalid @enderror" name="telefonePrincipal" onKeyPress="MascaraTelefone(this.value);" required autocomplete="telefonePrincipal" autofocus>
                    
                                                @error('telefonePrincipal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- fim da Div DisplayTable -->

                                    <div class="col-md-12 displayTable">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="telefoneAdicional">Telefone Adicional</label>
                                                <input id="telefoneAdicional" type="tel" class="form-control @error('telefoneAdicional') is-invalid @enderror" name="telefoneAdicional" required autocomplete="telefoneAdicional" autofocus>
                    
                                                @error('telefoneAdicional')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="endereco">Endereço</label>
                                                <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" required autocomplete="endereco" autofocus>
                    
                                                @error('endereco')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="numeroResidencia">N&deg;</label>
                                                <input id="numeroResidencia" type="text" class="form-control @error('numeroResidencia') is-invalid @enderror" name="numeroResidencia" required autocomplete="numeroResidencia" autofocus>
                    
                                                @error('numeroResidencia')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- fim da Div DisplayTable -->

                                    <div class="col-md-12 displayTable">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="complemento">Complemento</label>
                                                <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" name="complemento" required autocomplete="complemento" autofocus>
                    
                                                @error('complemento')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="bairro">Bairro</label>
                                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" required autocomplete="bairro" autofocus>
                    
                                                @error('bairro')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- fim da Div DisplayTable -->

                                    <div class="col-md-12 displayTable">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="cidade">Cidade</label>
                                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" required autocomplete="cidade" autofocus>
                    
                                                @error('cidade')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="estado">Estado</label>
                                                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" required autocomplete="estado" autofocus>
                    
                                                @error('estado')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="cep">CEP</label>
                                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" required autocomplete="cep" autofocus>
                    
                                                @error('cep')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><!-- fim da Div DisplayTable -->

                                    @if ($tipo_de_anuncio > 1)
                                        <div class="col-md-12">
                                            <div class="col-md-12 blocoRedesSociaisAnuncio">
                                                <div class="row">
                                                    <div class="col-md-12 tituloRedesSociais">
                                                        <h1 class="h4">
                                                            Redes Sociais
                                                        </h1>
                                                    </div>
    
                                                    <div class="col-md-6 blocoEsquerdoRedesSociaisAnuncio">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/facebook.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" placeholder="Link da página do Facebook" required autocomplete="facebook" autofocus>
                                        
                                                                    @error('facebook')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/twitter.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" placeholder="Link do Twitter" required autocomplete="twitter" autofocus>
                                        
                                                                    @error('twitter')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/youtube.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" placeholder="Link do canal do YouTube" required autocomplete="youtube" autofocus>
                                        
                                                                    @error('youtube')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/globe.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="globe" type="text" class="form-control @error('globe') is-invalid @enderror" name="globe" placeholder="Link do seu site" required autocomplete="globe" autofocus>
                                        
                                                                    @error('globe')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            </div><!-- fim da Div row -->
                                                        </div><!-- fim da Div blocoCadaRedeSociail -->
                                                        
                                                    </div><!-- fim da Div blocoEsquerdoRedesSociaisAnuncio -->
    
                                                    <div class="col-md-6 blocoDireitoRedesSociaisAnuncio">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/instagram.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" placeholder="Link da página do Instagram" required autocomplete="instagram" autofocus>
                                        
                                                                    @error('instagram')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/linkedin.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" placeholder="Link do Linkedin" required autocomplete="linkedin" autofocus>
                                        
                                                                    @error('linkedin')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/whatsapp.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" placeholder="(99) 9.9999-5555" required autocomplete="whatsapp" autofocus>
                                        
                                                                    @error('whatsapp')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                                <div class="col-md-2 iconeRedesSociaisAnuncio">
                                                                    <img src="{{ asset('images/email.svg') }}" class="iconeFacebookSVG" alt="">
                                                                </div><!-- fim da Div iconeRedesSociaisAnuncio -->
    
                                                                <div class="col-md-10 inputRedesSociaisAnuncio">
                                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Seu email" required autocomplete="email" autofocus>
                                        
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            </div><!-- fim da Div row -->
                                                        </div><!-- fim da Div blocoCadaRedeSociail -->
                                                    </div><!-- fim da Div blocoDireitoRedesSociaisAnuncio -->
                                                </div><!-- fim da Div row -->
                                            </div><!-- fim da Div blocoRedesSociaisAnuncio -->
                                        </div>
                                    @endif

                                    @if ($tipo_de_anuncio > 2)
                                        <div class="col-md-12">
                                            <div class="col-md-12 blocoRedesSociaisAnuncio">
                                                <div class="col-md-12 tituloRedesSociaisHorarioDeFuncionamento">
                                                    <h1 class="h4">
                                                        Horário de funcionamento
                                                    </h1>
                                                </div>
    
                                                <div class="col-md-12 blocoHorarioDeFuncionamento">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>domingo</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffDomingo">
                                                                    <span id="backgroundOnOffDomingo" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoDomingo()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo0" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreDomingo form-control @error('abreDomingo0') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo0" autocomplete="off">
                                                                        @error('abreDomingo0')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo0" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaDomingo form-control @error('fechaDomingo0') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo0" autocomplete="off">
                                                                        @error('fechaDomingo0')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>segunda-feira</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffSegunda">
                                                                    <span id="backgroundOnOffSegunda" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoSegunda()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo1" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreSegunda form-control @error('abreDomingo1') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo1" autocomplete="off">
                                                                        @error('abreDomingo1')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo1" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaSegunda form-control @error('fechaDomingo1') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo1" autocomplete="off">
                                                                        @error('fechaDomingo1')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>terça-feira</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffTerca">
                                                                    <span id="backgroundOnOffTerca" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoTerca()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo2" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreTerca form-control @error('abreDomingo2') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo2" autocomplete="off">
                                                                        @error('abreDomingo2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo2" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaTerca form-control @error('fechaDomingo2') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo2" autocomplete="off">
                                                                        @error('fechaDomingo2')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>quarta-feira</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffQuarta">
                                                                    <span id="backgroundOnOffQuarta" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoQuarta()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo3" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreQuarta form-control @error('abreDomingo3') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo3" autocomplete="off">
                                                                        @error('abreDomingo3')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo3" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaQuarta form-control @error('fechaDomingo3') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo3" autocomplete="off">
                                                                        @error('fechaDomingo3')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>quinta-feira</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffQuinta">
                                                                    <span id="backgroundOnOffQuinta" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoQuinta()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo4" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreQuinta form-control @error('abreDomingo4') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo4" autocomplete="off">
                                                                        @error('abreDomingo4')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo4" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaQuinta form-control @error('fechaDomingo4') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo4" autocomplete="off">
                                                                        @error('fechaDomingo4')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>sexta-feira</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffSexta">
                                                                    <span id="backgroundOnOffSexta" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoSexta()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo5" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreSexta form-control @error('abreDomingo5') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo5" autocomplete="off">
                                                                        @error('abreDomingo5')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo5" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaSexta form-control @error('fechaDomingo5') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo5" autocomplete="off">
                                                                        @error('fechaDomingo5')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
    
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2 blocoDiasDaSemana">
                                                                <span>sábado</span>
                                                            </div><!-- fim da Div blocoDiasDaSemana -->
    
                                                            <div class="col-md-2 inputRedesSociaisAnuncio">
                                                                <div class="backgroundOnOffSabado">
                                                                    <span id="backgroundOnOffSabado" class="btn btnOFF" onclick="habilitarInputHorarioFuncionamentoSabado()"></span>
                                                                </div>
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                            <div class="col-md-8 inputRedesSociaisAnuncio">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input id="abreDomingo6" type="text" class="time ui-timepicker-input inputDiaDaSemana inputAbreSabado form-control @error('abreDomingo6') is-invalid @enderror" placeholder="Abre à(s)" name="abreDomingo6" autocomplete="off">
                                                                        @error('abreDomingo6')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <input id="fechaDomingo6" type="text" class="time ui-timepicker-input inputDiaDaSemana inputFechaSabado form-control @error('fechaDomingo6') is-invalid @enderror" placeholder="Fecha à(s)" name="fechaDomingo6" autocomplete="off">
                                                                        @error('fechaDomingo6')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                                
                                                            </div><!-- fim da Div inputRedesSociaisAnuncio -->
    
                                                        </div><!-- fim da Div row -->
                                                    </div><!-- fim da Div  -->
                                                </div><!-- fim da Div blocoHorarioDeFuncionamento -->
                                            </div><!-- fim da Div blocoRedesSociaisAnuncio -->
                                        </div>
                                    @endif
                                    
                                    <button type="submit" class="btn btnPadrao float-right ajusteBtnPadrao">Cadastrar Negócio</button>

                                </div>
                            </div><!-- fim da Div form-group -->
                        </form>
                    </div><!-- fim da Div conteudoPaginaCadastrarAnuncio -->
                    
                </div><!-- fim da Div fotoLogoAnuncio -->
            </div>
        </div><!-- fim da Div conteudoPadrao -->
    </div><!-- fim da Div container -->

@endsection
