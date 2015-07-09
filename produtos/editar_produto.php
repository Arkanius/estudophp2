<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 09/07/2015
 * Time: 12:58
 */

require('../config.php');
require('../functions.php');

$produto = getProduto($_GET['id']);
if(empty($produto)){
    exit('Erro ao editar produto');
}

$option_select = criarSelectFornecedor(getFornecedorProduto(), $produto['fornec_id']);

function getProduto($produto_id){
    global $db;
    $produto = $db->query('SELECT * FROM produto WHERE prod_id = "'.$produto_id.'"')->fetch_array();
    return (!empty($produto) ? $produto : false );
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/produtos.js"></script>
    <title>Cadastro de produtos</title>
</head>
<body>
<fieldset>
    <legend>Editar produto</legend>
    <form id="form_produtos" name="form_produtos" method="POST" action="cadastrar_produtos.php">
        <label>Id fornecedor: </label><select name="id_fornecedor" id="id_fornecedor">
            <option value="0">Selecione um fornecedor</option>
            <?php   echo $option_select;?>
        </select>
        <br><br>
        <label>Nome: </label><input type="text" name="produto_nome" id="produto_nome" value="<?php echo $produto['prod_nome'] ?>"/><br><br>
        <label>Tipo: </label><input type="text" name="produto_tipo" id="produto_tipo" value="<?php echo $produto['prod_tipo'] ?>"/><br><br>
        <label>Descrição: </label><textarea rows="4" cols="50" name="descricao"><?php echo $produto['prod_desc'] ?></textarea><br><br>
        <label>Valor unitário: </label><input type="text" name="valor_unitario" id="valor_unitario" placeholder="R$ 0,00" value="<?php echo $produto['prod_valorunit'] ?>"/><br><br>
        <label>Valor de venda: </label><input type="text" name="valor_venda" id="valor_venda" placeholder="R$ 0,00" value="<?php echo $produto['prod_valorvenda'] ?>"/><br><br>
        <label>Desconto: % </label><input type="text" name="produto_desconto" id="produto_desconto" maxlength="2" value="<?php echo $produto['prod_desconto'] ?>"/><br><br>
        <label>Quantidade em estoque: </label><input type="text" name="qtd_estoque" id="qtd_estoque" value="<?php echo $produto['prod_qtdestoque'] ?>"/><br><br>
        <input type="hidden" value="editar" name="acao"/>
        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id_produto"/>
        <button type="submit" name="produto_cadastrar" id="produto_cadastrar">Cadastrar</button>

    </form>
</fieldset>
</body>
</html>