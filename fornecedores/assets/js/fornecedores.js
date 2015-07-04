/**
 * Created by Victor on 30/06/2015.
 */

$(document).ready(function () {
    $('#fornecedor_cep').mask('00000-000');
    $('#fornecedor_fone').mask('(99) 99999-9999');
    $('#fornecedor_cnpj').mask("99.999.999/9999-99");
});




function validarEmail()
{
    //var obj = eval("document.forms[0].Email");
    var obj = document.getElementById("fornecedor_email");
    var txt = obj.value;
    if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 1)))
    {
        alert('Email incorreto');
        obj.focus();
    }
}
