<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 05/07/2015
 * Time: 23:10
 */

require('../config.php');
include('../functions.php');

header('Content-Type: text/html; charset=latin1_swedish_ci');

$fornecedor_id = $_POST['id_fornecedor'];
$produto_nome = $_POST['produto_nome'];
$produto_tipo = $_POST['produto_tipo'];
$descricao = $_POST['descricao'];
$valor_unitario = $_POST['valor_unitario'];
$valor_venda = $_POST['valor_venda'];
$produto_desconto = $_POST['produto_desconto'];
$qtd_estoque = $_POST['qtd_estoque'];
$produto_id = $_POST['id_produto'];
$acao = $_POST['acao'];

if(!empty($acao)){
    $query = 'UPDATE produto SET fornec_id = ?, prod_nome = ?, prod_tipo = ?, prod_desc = ?, prod_valorunit = ?, prod_valorvenda = ?, prod_desconto = ?, prod_qtdestoque = ? WHERE prod_id = "'.$produto_id.'"';
}else{
    $query = 'INSERT INTO produto (fornec_id, prod_nome, prod_tipo, prod_desc, prod_valorunit, prod_valorvenda, prod_desconto, prod_qtdestoque) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
}


$valor_unitario = formatarDinheiro($valor_unitario);
$valor_venda = formatarDinheiro($valor_venda);
$descricao = utf8_encode($descricao);


if($stm = $db->prepare($query)){
    $stm->bind_param('isssddii', $fornecedor_id, $produto_nome, $produto_tipo, $descricao, $valor_unitario, $valor_venda, $produto_desconto, $qtd_estoque);

    if($stm->execute()){
        if(!empty($acao)){
            echo '<script>
                    alert("Dados atualizados com sucesso!");
                    window.location.href = "listar_produtos.php";
                  </script>
                ';
        }else{
            echo '<script>
                        alert("Dados cadastrados com sucesso");
                        window.location.href = "cadastro_produtos.php";
                  </script>
                    ';
        }
    }else{
        die('Erro: ( '.$db->errno.' ) '. $db->error);
    }

$stm->close();

}else{
    printf("Erro ao preparar statement: %s\n", $db->error);
}
