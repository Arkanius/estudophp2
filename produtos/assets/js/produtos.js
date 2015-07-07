/**
 * Created by Victor on 06/07/2015.
 */

$(document).ready(function () {

    mascarar_valores();
    $('#valor_unitario').on('change', function(){
        var valor_unitario = parseFloat($(this).val().replace('.', '').replace('R$ ', '').replace(',', '.'));console.log($(this).val());
        var valor_venda = valor_unitario + (valor_unitario * 0.3);
        $('#valor_venda').val('R$ '+ number_format(valor_venda, 2, ',', '.'));
    });

    $('#produto_desconto').on('change', function(){
        var desconto = parseInt($(this).val());
        if(desconto > 12){
            alert('O desconto não pode ser maior do que 12%');
            $(this).val(12);
            return;
        }
    });


    $.ajax({
        url: '../buscar_fornecedor.php',
        type: 'POST',
        datatype: 'JSON',
        data: {id_fornecedor: $('#id_fornecedor').val()},

        success: function(retorno){
            $('#id_fornecedor').find('option').remove();

            var html = '<option value="0">Selecione um fornecedor</option>';

            $.each(retorno, function(id, funcionario){
                html+= '<option value="'+id+'">'+funcionario+'</option>'
            });
            $('#id_fornecedor').html(html);
        }
    });

});



function mascarar_valores(){
    $('#valor_unitario, #valor_venda').mask('R$ 000.000,00');
}

function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '')
        .replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                    .toFixed(prec);
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
        .split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
            .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
            .join('0');
    }
    return s.join(dec);
}