$(document).ready(function(){
    
//    var width = $(window).width();
//    $(window).scroll(function(){
//        if(width > 650 && $(this).scrollTop() > 250) { 
//            $('.status-ft').addClass('show-ft');   
//        }else{
//            $('.status-ft').removeClass('show-ft');    
//        }
//    });
    
    $('.open-vl').magnificPopup({
        type: 'ajax',
        closeOnBgClick: true,
        showCloseBtn: false,
        callbacks: {
            open: function() {
            },
            close: function(){
            },
            success: function() {
                
            }
        }
    });

});


function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
        if (tecla==8 || tecla==0) return true;
        else  return false;
    }
}

function mascara(o,f){
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()",1);
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function mtel(v){
    v=v.replace(/\D/g,"");             
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    
    return v;
}

function Cpf(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return v;
}

function Cnpj(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
    v=v.replace(/(\d{4})(\d)/,"$1-$2")
    return v;
}

function Cep(v){
    v=v.replace(/D/g,"")
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")
    return v;
}