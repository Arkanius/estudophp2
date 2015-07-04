<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/07/2015
 * Time: 18:17
 */

require('../config.php');

$url = $_SERVER['REQUEST_URI'];
$url = explode('/', $url);
if(!empty($url[1])){

}

$result = $db->query('SELECT * FROM fornecedores WHERE forn_id = "'.$_GET["id"].'"')->fetch_array();

function editarFornecedor($id){
    global $db;

}
?>


<!DOCTYPE html>
<html>
<head lang="pt">
    <link rel="stylesheet" href="assets/css/fornecedores.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="assets/js/fornecedores.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <meta charset="UTF-8">
    <title>Cadastro de fornecedores</title>
</head>
<body>

<fieldset>
    <legend>Cadastro de fornecedores</legend>
    <form id="form_fornecedor" name="form_fornecedor" method="POST" action="/edit">
        <label>Cnpj: </label><input type="text" name="fornecedor_cnpj" id="fornecedor_cnpj" placeholder="99.999.999/9999-99" value="<?php echo $result['forn_cnpj']; ?>"/><br><br>
        <label>Razão social: </label><input type="text" name="fornecedor_razao" id="fornecedor_razao" value="<?php echo $result['forn_razaosoc']; ?>"/><br><br>
        <label>Rua: </label><input type="text" name="fornecedor_rua" id="fornecedor_rua" value="<?php echo $result['forn_rua']; ?>"/><br><br>
        <label>Número: </label><input type="text" name="fornecedor_numero" id="fornecedor_numero" value="<?php echo $result['forn_numero']; ?>"/><br><br>
        <label>Complemento: </label><input type="text" name="fornecedor_complemento" id="fornecedor_complemento" value="<?php echo $result['forn_complemento']; ?>"/><br><br>
        <label>Cep: </label><input type="text" name="fornecedor_cep" id="fornecedor_cep" placeholder="00000-000" value="<?php echo $result['forn_cep']; ?>"/><br><br>
        <label>Bairro: </label><input type="text" name="fornecedor_bairro" id="fornecedor_bairro" value="<?php echo $result['forn_bairro']; ?>"/><br><br>
        <label>Cidade: </label><input type="text" name="fornecedor_cidade" id="fornecedor_cidade" value="<?php echo $result['forn_cidade']; ?>"/><br><br>
        <label>UF: </label><input type="text" name="fornecedor_uf" id="fornecedor_uf" value="<?php echo $result['forn_uf']; ?>"/><br><br>
        <label>País: </label><input type="text" name="fornecedor_pais" id="fornecedor_pais" value="<?php echo $result['forn_pais']; ?>"/><br><br>
        <label>Telefone: </label><input type="text" name="fornecedor_fone" id="fornecedor_fone" placeholder="(99) 91234-5678" value="<?php echo $result['forn_fone']; ?>"/><br><br>
        <label>Email: </label><input type="text" name="fornecedor_email" id="fornecedor_email" placeholder="example@example.com" onblur="validarEmail()" value="<?php echo $result['forn_email']; ?>"/><br><br><br>
        <button type="submit" name="fornecedor_cadastrar" id="fornecedor_cadastrar">Cadastrar</button>
    </form>
</fieldset>

</body>
</html>