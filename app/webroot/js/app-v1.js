$(window).bind("pageshow", function () {
  $(".msg-send-form").hide();
  $(".bsc").show();
});

$(document).ready(function () {
  $(".menu-mobile").click(function () {
    $(".links").slideToggle();

    let icon = $(this).find("i");
    if (icon.hasClass("fa-bars")) {
      icon.removeClass("fa-bars").addClass("fa-times");
    } else {
      icon.removeClass("fa-times").addClass("fa-bars");
    }
  });
});

function SomenteNumero(e) {
  var tecla = window.event ? event.keyCode : e.which;
  if (tecla > 47 && tecla < 58) return true;
  else {
    if (tecla == 8 || tecla == 0) return true;
    else return false;
  }
}

function mascara(o, f) {
  v_obj = o;
  v_fun = f;
  setTimeout("execmascara()", 1);
}

function execmascara() {
  v_obj.value = v_fun(v_obj.value);
}

function mtel(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
  v = v.replace(/(\d)(\d{4})$/, "$1-$2");
  return v;
}

function Cpf(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d)/, "$1.$2");
  v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  return v;
}

function Cnpj(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{2})(\d)/, "$1.$2");
  v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
  v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");
  v = v.replace(/(\d{4})(\d)/, "$1-$2");
  return v;
}

function Cep(v) {
  v = v.replace(/D/g, "");
  v = v.replace(/^(\d{5})(\d)/, "$1-$2");
  return v;
}
