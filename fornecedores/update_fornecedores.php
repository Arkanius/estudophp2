<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 05/07/2015
 * Time: 00:34
 */

require('../config.php');
include('../functions.php');

$id = $_POST['id'];
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


$fone = limparCaracteres($fone);
$cep = limparCaracteres($cep);


if($stmt = $db->prepare("UPDATE fornecedores SET forn_cnpj = ?, forn_razaosoc = ?, forn_rua = ?, forn_numero = ?, forn_complemento = ?, forn_cep = ?, forn_bairro = ?,
                                        forn_cidade = ?, forn_uf = ?, forn_pais = ?, forn_fone = ?, forn_email = ? WHERE forn_id = ?")) {
    $stmt->bind_param('sssissssssssi', $cnpj, $razao, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $pais, $fone, $email, $id);

    if($stmt->execute()){
        echo '<script>
                    alert("Dados cadastrados com sucesso");
                    window.location.href = "listar_fornecedores.php";
              </script>
                ';
    }else{
        die('Erro: ( '.$db->errno.' ) '. $db->error);
    }

}else{
    printf("Erro ao preparar statement: %s\n", $db->error);
}

$stmt->close();

