<?php
include('../config.php');
require('../functions.php');

$option_select = criarSelectFornecedor(getFornecedorProduto());

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
            <legend>Cadastro de produtos</legend>
                <form id="form_produtos" name="form_produtos" method="POST" action="cadastrar_produtos.php">
                    <label>Id fornecedor: </label><select name="id_fornecedor" id="id_fornecedor">
                                                    <option value="0">Selecione um fornecedor</option>
                                                    <?php   echo $option_select;    ?>
                                                  </select>
                    <br><br>
                    <label>Nome: </label><input type="text" name="produto_nome" id="produto_nome"/><br><br>
                    <label>Tipo: </label><input type="text" name="produto_tipo" id="produto_tipo"/><br><br>
                    <label>Descrição: </label><textarea rows="4" cols="50" name="descricao"></textarea><br><br>
                    <label>Valor unitário: </label><input type="text" name="valor_unitario" id="valor_unitario" placeholder="R$ 0,00"/><br><br>
                    <label>Valor de venda: </label><input type="text" name="valor_venda" id="valor_venda" placeholder="R$ 0,00"/><br><br>
                    <label>Desconto: % </label><input type="text" name="produto_desconto" id="produto_desconto" maxlength="2"/><br><br>
                    <label>Quantidade em estoque: </label><input type="text" name="qtd_estoque" id="qtd_estoque"/><br><br>
                    <button type="submit" name="produto_cadastrar" id="produto_cadastrar">Cadastrar</button>
                    <button type="button" onclick="window.location='../index.html';">Início</button>
                </form>
      </fieldset>
</body>
</html>