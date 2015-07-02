<?php

require('../config.php');

$nome = $_POST['fornecedor_nome'];
$cnpj = $_POST['fornecedor_cnpj'];
$razao = $_POST['fornecedor_razao'];
$rua = $_POST['fornecedor_rua'];
$numero = $_POST['fornecedor_numero'];
$complemento = $_POST['fornecedor_complemento'];
$cep = $_POST['fornecedor_cep'];
$bairro = $_POST['fornecedor_bairro'];
$cidade = $_POST['fornecedor_cidade'];
$uf = $_POST['fornecedor_uf'];
$pais = $_POST['fornecedor_pais'];
$fone = $_POST['fornecedor_fone'];
$email = $_POST['fornecedor_email'];

$cnpj = limpar_caracteres($cnpj);

print_r($cnpj);







function limpar_caracteres($param){
    return preg_replace('/\D/', '', $param);
}