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

$cnpj = limparCaracteres($cnpj);
if(!validarEmail($email)){
    exit('Email digitado inválido');
}
$id = 3;


    if($stmt = $db->prepare("INSERT INTO fornecedores(forn_id, forn_cnpj, forn_razaosoc, forn_rua, forn_numero, forn_complemento, forn_cep, forn_bairro,
                                        forn_cidade, forn_uf, forn_pais, forn_fone, forn_email) VALUES (?, ?, ?, ?, ?, ? ,?, ? ,? ,? ,? ,? , ?)")) {
        $stmt->bind_param('isssissssssss', $id, $cnpj, $razao, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $pais, $fone, $email);

        if($stmt->execute()){
            echo 'Inseriu OK';
        }else{
            die('Erro: ( '.$db->errno.' ) '. $db->error);
        }

    }else{
        printf("Erro ao preparar statement: %s\n", $db->error);
    }

$stmt->close();




function limparCaracteres($param){
    return preg_replace('/\D/', '', $param);
}

function validarEmail($email){
    return  (preg_match("/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/", $email) ? true : false);
}

function getLastId($nomeTabela){
    global $db;
    $db->query("SELECT forn_id FROM fornecedores WHERE id = 1")->fetch_object()->product_name;
}