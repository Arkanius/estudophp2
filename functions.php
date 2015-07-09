<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 05/07/2015
 * Time: 00:40
 */


function limparCaracteres($param){
    return preg_replace('/\D/', '', $param);
}

function validarEmail($email){
    return  (preg_match("/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/", $email) ? true : false);
}

function getLastId(){
    global $db;
    $result =  $db->query("SELECT MAX(forn_id) as id FROM fornecedores")->fetch_assoc();
    return $result['id'] + 1;
}


function formatarDinheiro($valor){
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    $valor = str_replace('R$ ', '', $valor);
    return $valor;
}

function getFornecedorProduto(){
    global $db;
    return $db->query('SELECT
                        f.forn_id,
                        f.forn_email
                    FROM
                        fornecedores f
                    LEFT JOIN produto p ON p.fornec_id = f.forn_id
                    GROUP BY
                        f.forn_id')->fetch_all();
}

function criarSelectFornecedor($resultado_query, $edicao = false){
    $html = '';
    foreach($resultado_query as $key => $fornecedor){
        $html .= '<option value="'.$fornecedor[0].'" '.(!empty($edicao) && $edicao == $fornecedor[0] ? "selected" : "").'>'.$fornecedor[1].'</option>';
    }

    return $html;
}