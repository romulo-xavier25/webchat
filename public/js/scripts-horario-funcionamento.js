function habilitarInputHorarioFuncionamentoDomingo()
{
    let btnOnDomingo = document.querySelector('.backgroundOnOffDomingo>span');
    btnOnDomingo = btnOnDomingo.classList;

    for(var i = 0; i < btnOnDomingo.length; i++){
        
        if(btnOnDomingo[i] == "btnOFF"){
            $(".backgroundOnOffDomingo").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreDomingo").css("display", "block");
            $(".inputFechaDomingo").css("display", "block");
            
            btnOnDomingo.remove("btnOFF");
            btnOnDomingo.add("btnON");
            btnOnDomingo = btnOnDomingo.classList;
        }
        if(btnOnDomingo[i] == "btnON"){
            $(".backgroundOnOffDomingo").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreDomingo").css("display", "none");
            $(".inputFechaDomingo").css("display", "none");
            
            btnOnDomingo.remove("btnON");
            btnOnDomingo.add("btnOFF");
            btnOnDomingo = btnOnDomingo.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoSegunda()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffSegunda>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffSegunda").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreSegunda").css("display", "block");
            $(".inputFechaSegunda").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffSegunda").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreSegunda").css("display", "none");
            $(".inputFechaSegunda").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoTerca()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffTerca>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffTerca").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreTerca").css("display", "block");
            $(".inputFechaTerca").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffTerca").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreTerca").css("display", "none");
            $(".inputFechaTerca").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoQuarta()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffQuarta>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffQuarta").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreQuarta").css("display", "block");
            $(".inputFechaQuarta").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffQuarta").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreQuarta").css("display", "none");
            $(".inputFechaQuarta").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoQuinta()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffQuinta>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffQuinta").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreQuinta").css("display", "block");
            $(".inputFechaQuinta").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffQuinta").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreQuinta").css("display", "none");
            $(".inputFechaQuinta").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoSexta()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffSexta>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffSexta").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreSexta").css("display", "block");
            $(".inputFechaSexta").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffSexta").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreSexta").css("display", "none");
            $(".inputFechaSexta").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

function habilitarInputHorarioFuncionamentoSabado()
{
    let btnOnSegunda = document.querySelector('.backgroundOnOffSabado>span');
    btnOnSegunda = btnOnSegunda.classList;

    for(var i = 0; i < btnOnSegunda.length; i++){
        
        if(btnOnSegunda[i] == "btnOFF"){
            $(".backgroundOnOffSabado").css({"background-color": "#ffcb00", "transition": "ease 0.3s"});
            $(".inputAbreSabado").css("display", "block");
            $(".inputFechaSabado").css("display", "block");
            
            btnOnSegunda.remove("btnOFF");
            btnOnSegunda.add("btnON");
            btnOnSegunda = btnOnSegunda.classList;
        }
        if(btnOnSegunda[i] == "btnON"){
            $(".backgroundOnOffSabado").css({"background-color": "#e6e6e6", "transition": "ease 0.2s"});
            $(".inputAbreSabado").css("display", "none");
            $(".inputFechaSabado").css("display", "none");
            
            btnOnSegunda.remove("btnON");
            btnOnSegunda.add("btnOFF");
            btnOnSegunda = btnOnSegunda.classList;
        }
    }
}

let inputAbre = 6;
let inputFecha = 6;

for(i = 0; i < inputAbre; i++){
    $('#abreDomingo' + i).timepicker();
}

for(i = 0; i < inputFecha; i++){
    $('#fechaDomingo' + i).timepicker();
}
