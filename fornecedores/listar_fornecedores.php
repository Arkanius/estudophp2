<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/07/2015
 * Time: 14:41
 */
require('../config.php');

$fornecedores = getFornecedores();


echo '<!DOCTYPE html>
            <html>
                    <head>
                    <title>Lista de fornecedores</title>
                    <meta charset="UTF-8">
                    </head>
                <body>
                <h1>Fornecedores cadastrados</h1>
                    <table id="tb_fornecedores">
                      <tr>
                      <th>ID</th>
                        <th>Email</td>
                        <th>CNPJ</td>
                        <th>Telefone</td>
                        <th>Açóes</td>
                      </tr>
                      '.gerarTabelaFornecedores($fornecedores).'
                    </table>
                </body>
            </html>
    ';







function getFornecedores(){
    global $db;
    return  $db->query("SELECT * FROM fornecedores")->fetch_all();
}

function gerarTabelaFornecedores ($resultado_query){
    global $db;

    $html ='';
    foreach($resultado_query as $key => $fornecedor){
        $html.='<tr>
            <td>'.$fornecedor[0].'</td>
            <td>'.$fornecedor[12].'</td>
            <td>'.$fornecedor[1].'</td>
            <td>'.$fornecedor[11].'</td>
            <td><a href="editar_fornecedores.php?id='.$fornecedor[0].'">Editar</a>
            <a href="excluir_fornecedor.php?id='.$fornecedor[0].'">Excluir</a>
            </td>
            </tr>';
    };

    return $html;

}