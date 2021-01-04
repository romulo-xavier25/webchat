$(Document).ready(function(){
    $('.alterar').click(function(){
        $(".blocoPerfil").css("display", "none");
        $(".formEditarPerfil").css("display", "table");
    });
    $('.btnCancelar').click(function(){
        $(".formEditarPerfil").css("display", "none");
        $(".blocoPerfil").css("display", "table");
    });
});

/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");                  //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}

function onClickFormOpcoesPlanosTresAnos()
{
    let opcaoPlanoTresAnos = document.getElementById("tresAnos");

    if(opcaoPlanoTresAnos.id == "tresAnos"){
        let strongBasico = document.getElementById("basico");
        let strongPro = document.getElementById("profissional");
        let strongBusiness = document.getElementById("business");
        strongBasico.innerHTML = "23,90";
        strongPro.innerHTML = "35,90";
        strongBusiness.innerHTML = "59,90";
    }
}

function onClickFormOpcoesPlanosUmAno()
{
    let opcaoPlanoUmAno = document.getElementById("umAno");

    if(opcaoPlanoUmAno.id == "umAno"){
        let strongBasico = document.getElementById("basico");
        let strongPro = document.getElementById("profissional");
        let strongBusiness = document.getElementById("business");
        strongBasico.innerHTML = "25,90";
        strongPro.innerHTML = "38,90";
        strongBusiness.innerHTML = "64,90";
    }
}

function onClickFormOpcoesPlanosSeisMeses()
{
    let opcaoPlanoSeisMeses = document.getElementById("seisMeses");

    if(opcaoPlanoSeisMeses.id == "seisMeses"){
        let strongBasico = document.getElementById("basico");
        let strongPro = document.getElementById("profissional");
        let strongBusiness = document.getElementById("business");
        strongBasico.innerHTML = "28,90";
        strongPro.innerHTML = "42,90";
        strongBusiness.innerHTML = "70,90";
    }
}

function onClickFormOpcoesPlanosUmMes()
{
    let opcaoPlanoUmMes = document.getElementById("umMes");

    if(opcaoPlanoUmMes.id == "umMes"){
        let strongBasico = document.getElementById("basico");
        let strongPro = document.getElementById("profissional");
        let strongBusiness = document.getElementById("business");
        strongBasico.innerHTML = "39,90";
        strongPro.innerHTML = "59,90";
        strongBusiness.innerHTML = "99,90";
    }
}

    var idContador = 0;
			
	function exclui(id){
		var campo = $("#"+id.id);
		campo.hide(200);
	}

	$( document ).ready(function() {
		
		$("#btnAdicionaEmail").click(function(e){
			e.preventDefault();
			var tipoCampo = "email";
			adicionaCampo(tipoCampo);
		})
		
		$("#btnAdicionaTelefone").click(function(e){
			e.preventDefault();
			var tipoCampo = "telefone";
			adicionaCampo(tipoCampo);
		})
		
		function adicionaCampo(tipo){

			idContador++;
			
			var idCampo = "campoExtra"+idContador;
			var idForm = "formExtra"+idContador;
		
			var html = "";
			
			html += "<div style='margin-top: 15px;' class='input-group' id='"+idForm+"'>";
			html += "<input type='text' id='"+idCampo+"' class='form-control novoCampo' placeholder=''/>";
			html += "<span class='input-group-btn'>";
            html +=	"<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";
			html += "</span>";
			html += "</div>";
			
			$("#imendaHTML"+tipo).append(html);
		}
		
		$(".btnExcluir").click(function(){
			$(this).slideUp(200);
		})
		
		$("#btnSalvar").click(function(){
		
		var mensagem = "";
		var novosCampos = [];
		var camposNulos = false;
		
			$('.campoDefault').each(function(){
				if($(this).val().length < 1){
					camposNulos = true;
				}
			});
			$('.novoCampo').each(function(){
				if($(this).is(":visible")){
					if($(this).val().length < 1){
						camposNulos = true;
					}
					mensagem+= $(this).val()+"\n";
				}
			});
			
			if(camposNulos == true){
				alert("Atenção: existem campos nulos");
			}else{
				alert("Novos campos adicionados: \n\n "+mensagem);
			}
			
			novosCampos = [];
		})
		
    });

function novosCamposSindico()
{
    let select = document.getElementById('identificacao');
	let value = select.options[select.selectedIndex].value;
	let url_atual = window.location.hostname;
	if(value == "Síndico"){
		$(".opcaoDosSindicos").css("display", "block");
		document.cadastrarUsuario.action = 'http://' + url_atual + ":8000/register";
	}
	if(value == "Fornecedor"){
		$(".opcaoDosSindicos").css("display", "none");
		document.cadastrarUsuario.action = 'http://' + url_atual + ":8000/register";
	}
	if(value == ""){
		$(".opcaoDosSindicos").css("display", "none");
		document.cadastrarUsuario.action = 'http://' + url_atual + ":8000/register";
	}
}

$(Document).ready(function(){
	$("#desocultarComentarios").click(function(){

		let visibilidade = document.getElementById('desocultarComentarios');

		if(visibilidade.className == "btnDesocultarComentarios"){
			$(".displayNone").css("display", "block");
			$("a#desocultarComentarios").removeClass("btnDesocultarComentarios");
			$("a#desocultarComentarios").addClass("btnOcultarComentarios");
		} else {
			$(".displayNone").css("display", "none");
			$("a#desocultarComentarios").removeClass("btnOcultarComentarios");
			$("a#desocultarComentarios").addClass("btnDesocultarComentarios");
		}
	});
});

function capturarInputCpfCnpj(cpfCnpj){
	console.log(validarCpfCadastrarAnuncio(cpfCnpj));
	console.log(validarCnpjCadastrarAnuncio(cpfCnpj));
}

function validarCpfCadastrarAnuncio(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return "cpf valido";   
}

function validarCnpjCadastrarAnuncio(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return "cnpj valido";
    
}
