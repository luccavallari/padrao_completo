function sticky_footer() {
    var mFoo = $("footer");
    if ((($(document.body).height() + mFoo.outerHeight()) < $(window).height() && mFoo.css("position") == "fixed") || ($(document.body).height() < $(window).height() && mFoo.css("position") != "fixed")) {
        mFoo.css({ position: "fixed", bottom: "0px" });
    } else {
        mFoo.css({ position: "static" });
    }
}

function verificaMenu(){
    var janela = $(window).width();
    console.log(parseInt(janela));
    if(parseInt(janela) > 769){
        $("#menuResp").css("display","block");
        $("#menuResp").removeAttr('style');
    }
    else{
        $("nav").addClass("clearfix");
    }
}

function validarCNPJ(cnpj) {

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

    return true;

}

function validarCPF(cpf) {
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
    return true;
}



// function alturaTela() {
//     var alturaTela = $(window).height();
//     $("#topo, #meio").css('height', alturaTela);
// }

$(document).ready(function () {
    var menuResp = $("#menuResp");

    sticky_footer();
    // verificaMenu();
    $(window).scroll(function(){
        sticky_footer();
        // verificaMenu();
    });
    $(window).resize(function(){
        sticky_footer();
        // verificaMenu();
    });
    $(window).load(function(){
        sticky_footer();
        // verificaMenu();
    });

    $("#abreFechaMenu").click(function(){
        $(this).toggleClass('active');
        if(!menuResp.is(":visible"))
            menuResp.slideDown('fast');
        else{
            menuResp.slideUp('fast').end();
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00)0000-00009");

    $("form").submit(function(){
        // var url = "http://localhost:8080/unimed_diaSecretaria/home/salva_dados/";
        var url = "http://audicomunicacao.com.br/unimed_diaSecretaria/home/salva_dados/";
        var dados = $(this).serialize();

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: dados,
            success: function(resp){
                if(resp.msg == "OK"){
                    alert("Cadastro realizado com sucesso!");
                    window.location = "http://www.unimedprudente.com.br/";
                }
                else
                    alert(resp.msg);
            },
            error: function(er){
                alert('Ocorreu um erro no envio. Por favor, tente mais tarde!');
                console.log(er.responseText);
            }
        })
        return false;
    });

    $("#cpf").blur(function(){
        var cpf = $(this).val();
        var assinatura = $('input[type="hidden"]').val();
        var param = 'cpf=' + cpf + '&csrf_test_name=' + assinatura;
        // var link = "http://localhost:8080/unimed_diaSecretaria/home/verificaCpf/";
        var link = "http://audicomunicacao.com.br/unimed_diaSecretaria/home/verificaCpf/";

        if(!validarCPF(cpf)){
            $("button[type='submit']").attr('disabled','disabled');
            alert("CPF Inválido! Por favor, digite-o corretamente.");
        }
        else{
            $("button[type='submit']").removeAttr('disabled');
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'json',
                data: param,
                success: function(resp){
                    if(resp.msg == "OK"){
                        $("button[type='submit']").removeAttr('disabled');
                        console.log(resp.msg);
                    }
                    else{
                        $("button[type='submit']").attr('disabled','disabled');
                        alert(resp.msg);
                    }
                },
                error: function(er){
                    $("button[type='submit']").removeAttr('disabled');
                    alert('Ocorreu um erro no envio. Por favor, tente mais tarde!');
                    console.table(er);
                }
            });
        }
    });
    // alturaTela();
    // $(window).scroll(alturaTela);
    // $(window).resize(alturaTela);
    // $(window).load(alturaTela);
});