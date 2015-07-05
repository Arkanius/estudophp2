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