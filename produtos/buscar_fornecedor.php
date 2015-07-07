<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 07/07/2015
 * Time: 00:10
 */

require('../config.php');

$id_fornecedor = $_REQUEST['id_fornecedor'];
$query = 'SELECT forn_id, forn_email FROM fornecedores WHERE forn_id = "'.$id_fornecedor.'"';