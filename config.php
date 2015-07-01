<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 29/06/2015
 * Time: 21:42
 */

$user = 'root';
$porta = '';
$bancoLocal = 'localhost';
$password = '';
$bancoNome = 'sistema';

$db = new mysqli($bancoLocal, $user, $password, $bancoNome);

unset($password);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}else {
    echo 'conectou de boas';
}

